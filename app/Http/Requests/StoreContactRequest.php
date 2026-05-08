<?php

namespace App\Http\Requests;

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
        $this->merge([
            'phone' => $this->normalizePhone((string) $this->input('phone', '')),
        ]);
    }

    /**
     * Возвращает правила валидации формы контактов.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'min:7', 'max:20'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ];
    }

    /**
     * Возвращает пользовательские тексты ошибок валидации.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Поле имени обязательно для заполнения.',
            'email.required' => 'Поле email обязательно для заполнения.',
            'email.email' => 'Введите корректный email адрес.',
            'phone.required' => 'Поле телефона обязательно для заполнения.',
            'phone.min' => 'Телефон указан некорректно.',
            'subject.required' => 'Поле темы обязательно для заполнения.',
            'message.required' => 'Поле сообщения обязательно для заполнения.',
        ];
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
