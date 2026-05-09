<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormProtection
{
    public function validate(Request $request): ?string
    {
        $formStartedAt = (int) $request->input('form_started_at', 0);
        if ($formStartedAt > 0 && (time() - $formStartedAt) < 3) {
            return 'Форма отправлена слишком быстро.';
        }

        if (app()->environment('testing')) {
            return null;
        }

        $secretKey = trim((string) config('services.recaptcha.secret_key', ''));
        if ($secretKey === '') {
            return null;
        }

        $token = trim((string) $request->input('recaptcha_token', ''));
        if ($token === '') {
            return 'Проверка reCAPTCHA не пройдена.';
        }

        $response = Http::asForm()
            ->timeout(5)
            ->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $token,
                'remoteip' => $request->ip(),
            ]);

        if (! $response->ok()) {
            return 'Проверка reCAPTCHA не пройдена.';
        }

        $payload = $response->json();
        $success = (bool) ($payload['success'] ?? false);
        $score = (float) ($payload['score'] ?? 0);

        if (! $success || $score < 0.5) {
            return 'Проверка reCAPTCHA не пройдена.';
        }

        return null;
    }
}
