<?php

namespace App\Http\Requests;

use App\Support\FormProtection;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Определяет, может ли пользователь отправить запрос.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Нормализует входящие данные перед валидацией.
     */
    protected function prepareForValidation(): void
    {
        if (trim((string) $this->input('website', '')) !== '') {
            abort(403);
        }

        $preferred = $this->input('preferred_contact', []);
        if (is_string($preferred)) {
            $preferred = [$preferred];
        }

        $contactDetails = trim((string) $this->input('contact_details', ''));
        $phone = trim((string) $this->input('phone', ''));
        $email = trim((string) $this->input('email', ''));
        $social = trim((string) $this->input('social_contact', ''));

        if ($contactDetails !== '') {
            if (in_array('phone', $preferred, true) && $phone === '') {
                $phone = $contactDetails;
            }
            if (in_array('email', $preferred, true) && $email === '') {
                $email = $contactDetails;
            }
            if (in_array('social', $preferred, true) && $social === '') {
                $social = $contactDetails;
            }
        }

        $this->merge([
            'preferred_contact' => $preferred,
            'phone' => $this->normalizePhone($phone),
            'email' => $email,
            'social_contact' => $social,
        ]);
    }

    /**
     * Возвращает правила валидации формы контактов.
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'min:7', 'max:20'],
            'social_contact' => ['nullable', 'string', 'max:255'],
            'preferred_contact' => ['required', 'array', 'min:1'],
            'preferred_contact.*' => ['in:phone,email,social'],
            'subject' => ['nullable', 'string', 'max:255'],
            'request_text' => ['nullable', 'string', 'max:1000'],
            'message' => ['nullable', 'string'],
        ];
    }

    /**
     * Возвращает пользовательские тексты ошибок валидации.
     */
    public function messages(): array
    {
        return [
            'email.email' => 'Введите корректный email адрес.',
            'phone.min' => 'Телефон указан некорректно.',
            'preferred_contact.required' => 'Выберите предпочитаемый тип связи.',
            'preferred_contact.array' => 'Выберите предпочитаемый тип связи.',
            'preferred_contact.min' => 'Выберите хотя бы один тип связи.',
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $preferred = $this->input('preferred_contact', []);

            if (in_array('phone', $preferred, true) && empty($this->input('phone'))) {
                $validator->errors()->add('phone', 'Укажите номер телефона.');
            }

            if (in_array('email', $preferred, true) && empty($this->input('email'))) {
                $validator->errors()->add('email', 'Укажите email адрес.');
            }

            if (in_array('social', $preferred, true) && empty($this->input('social_contact'))) {
                $validator->errors()->add('social_contact', 'Укажите соцсеть для связи.');
            }

            $protectionError = app(FormProtection::class)->validate($this);
            if ($protectionError !== null) {
                $validator->errors()->add('recaptcha_token', $protectionError);
            }
        });
    }

    /**
     * Приводит телефон к единому формату.
     */
    private function normalizePhone(string $phone): string
    {
        $phone = trim($phone);
        if ($phone === '') {
            return '';
        }

        $hasLeadingPlus = str_starts_with($phone, '+');
        $digitsOnly = preg_replace('/\D+/', '', $phone) ?? '';

        if ($digitsOnly === '') {
            return '';
        }

        return $hasLeadingPlus ? '+' . $digitsOnly : $digitsOnly;
    }
}
