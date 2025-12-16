<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AntiSpamMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Honeypot — мгновенный стоп
        |--------------------------------------------------------------------------
        */
        if ($request->filled('website')) {
            Log::warning('Spam blocked: honeypot', [
                'ip' => $request->ip(),
                'ua' => $request->userAgent(),
            ]);

            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Проверка времени заполнения формы
        |--------------------------------------------------------------------------
        */
        if (
            !$request->filled('form_started_at') ||
            time() - (int) $request->form_started_at < 5
        ) {
            Log::warning('Spam blocked: submitted too fast', [
                'ip' => $request->ip(),
            ]);

            abort(403);
        }

        /*
        |--------------------------------------------------------------------------
        | 3. reCAPTCHA v3 — строгая проверка
        |--------------------------------------------------------------------------
        */
        $secretKey = config('services.recaptcha.secret_key');

        if (!empty($secretKey)) {
            $token = $request->input('recaptcha_token');

            if (empty($token)) {
                Log::warning('Spam blocked: missing recaptcha token', [
                    'ip' => $request->ip(),
                ]);

                abort(403);
            }

            $recaptcha = $this->verifyRecaptcha($token, $request->ip());

            if (!($recaptcha['success'] ?? false)) {
                Log::warning('Spam blocked: recaptcha failed', [
                    'ip' => $request->ip(),
                    'errors' => $recaptcha['error-codes'] ?? [],
                ]);

                abort(403);
            }

            if (($recaptcha['action'] ?? '') !== 'submit_application') {
                Log::warning('Spam blocked: recaptcha action mismatch', [
                    'ip' => $request->ip(),
                    'action' => $recaptcha['action'] ?? null,
                ]);

                abort(403);
            }

            if (($recaptcha['score'] ?? 0) < 0.6) {
                Log::warning('Spam blocked: low recaptcha score', [
                    'ip' => $request->ip(),
                    'score' => $recaptcha['score'] ?? null,
                ]);

                abort(403);
            }
        }

        return $next($request);
    }

    /**
     * Проверка reCAPTCHA v3
     */
    private function verifyRecaptcha(string $token, ?string $remoteIp = null): array
    {
        $secretKey = config('services.recaptcha.secret_key');

        if (empty($secretKey)) {
            return ['success' => false];
        }

        $data = [
            'secret'   => $secretKey,
            'response' => $token,
        ];

        if ($remoteIp) {
            $data['remoteip'] = $remoteIp;
        }

        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data),
                'timeout' => 3,
            ],
        ];

        $context = stream_context_create($options);
        $result  = @file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify',
            false,
            $context
        );

        if ($result === false) {
            return ['success' => false];
        }

        return json_decode($result, true) ?? ['success' => false];
    }
}
