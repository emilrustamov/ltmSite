<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AntiSpamMiddleware
{
    // Разрешенные действия для reCAPTCHA
    private const ALLOWED_ACTIONS = ['submit_application', 'submit_contact'];
    
    // Минимальные score для разных типов форм
    private const MIN_SCORE_APPLICATION = 0.7; // Более строгий для заявок
    private const MIN_SCORE_CONTACT = 0.6;     // Менее строгий для контактов
    
    // Минимальное время заполнения формы (в секундах)
    private const MIN_TIME_APPLICATION = 15; // 15 секунд для заявок
    private const MIN_TIME_CONTACT = 5;       // 5 секунд для контактов

    public function handle(Request $request, Closure $next)
    {
        // Проверка honeypot поля
        if ($request->filled('website')) {
            Log::warning('Spam blocked: honeypot', [
                'ip' => $request->ip(),
                'ua' => $request->userAgent(),
                'url' => $request->fullUrl(),
            ]);

            abort(403, 'Spam detected');
        }

        // Проверка User-Agent (боты часто не отправляют или отправляют поддельный)
        $userAgent = $request->userAgent();
        if (empty($userAgent) || $this->isSuspiciousUserAgent($userAgent)) {
            Log::warning('Spam blocked: suspicious or missing user agent', [
                'ip' => $request->ip(),
                'ua' => $userAgent,
                'url' => $request->fullUrl(),
            ]);

            abort(403, 'Invalid request');
        }

        // Определяем тип формы по маршруту
        $isApplication = $request->routeIs('applications.store');
        $minTime = $isApplication ? self::MIN_TIME_APPLICATION : self::MIN_TIME_CONTACT;

        // Проверка времени заполнения формы
        if (
            !$request->filled('form_started_at') ||
            time() - (int) $request->form_started_at < $minTime
        ) {
            Log::warning('Spam blocked: submitted too fast', [
                'ip' => $request->ip(),
                'time_taken' => $request->filled('form_started_at') ? time() - (int) $request->form_started_at : 0,
                'min_required' => $minTime,
                'url' => $request->fullUrl(),
            ]);

            abort(403, 'Form submitted too quickly');
        }

        // Проверка на подозрительно быстрое заполнение (более 2 минут - тоже подозрительно)
        if ($request->filled('form_started_at') && time() - (int) $request->form_started_at > 120) {
            Log::warning('Spam blocked: form filled too slowly (possible automation)', [
                'ip' => $request->ip(),
                'time_taken' => time() - (int) $request->form_started_at,
                'url' => $request->fullUrl(),
            ]);

            abort(403, 'Suspicious form submission');
        }

        $secretKey = config('services.recaptcha.secret_key');

        if (!empty($secretKey)) {
            $token = $request->input('recaptcha_token');

            if (empty($token)) {
                Log::warning('Spam blocked: missing recaptcha token', [
                    'ip' => $request->ip(),
                    'url' => $request->fullUrl(),
                ]);

                abort(403, 'Security verification failed');
            }

            $recaptcha = $this->verifyRecaptcha($token, $request->ip());

            if (!($recaptcha['success'] ?? false)) {
                Log::warning('Spam blocked: recaptcha failed', [
                    'ip' => $request->ip(),
                    'errors' => $recaptcha['error-codes'] ?? [],
                    'url' => $request->fullUrl(),
                ]);

                abort(403, 'Security verification failed');
            }

            // Проверка действия
            $action = $recaptcha['action'] ?? '';
            if (!in_array($action, self::ALLOWED_ACTIONS, true)) {
                Log::warning('Spam blocked: recaptcha action mismatch', [
                    'ip' => $request->ip(),
                    'action' => $action,
                    'allowed' => self::ALLOWED_ACTIONS,
                    'url' => $request->fullUrl(),
                ]);

                abort(403, 'Invalid form action');
            }

            // Разные пороги score для разных типов форм
            $minScore = $isApplication ? self::MIN_SCORE_APPLICATION : self::MIN_SCORE_CONTACT;
            $score = $recaptcha['score'] ?? 0;
            
            if ($score < $minScore) {
                Log::warning('Spam blocked: low recaptcha score', [
                    'ip' => $request->ip(),
                    'score' => $score,
                    'min_required' => $minScore,
                    'action' => $action,
                    'url' => $request->fullUrl(),
                ]);

                abort(403, 'Low security score');
            }
        }

        return $next($request);
    }

    /**
     * Проверка на подозрительный User-Agent
     */
    private function isSuspiciousUserAgent(?string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true;
        }

        // Список подозрительных паттернов
        $suspiciousPatterns = [
            'bot', 'crawler', 'spider', 'scraper', 'curl', 'wget', 
            'python', 'java', 'go-http', 'httpie', 'postman',
            'headless', 'phantom', 'selenium', 'webdriver'
        ];

        $userAgentLower = strtolower($userAgent);
        
        foreach ($suspiciousPatterns as $pattern) {
            if (str_contains($userAgentLower, $pattern)) {
                return true;
            }
        }

        return false;
    }

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
