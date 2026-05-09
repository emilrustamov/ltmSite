<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLanguageRequest extends FormRequest
{
    /**
     * Determine if the request is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get validation rules.
     */
    public function rules(): array
    {
        return [
            'name_ru' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'name_tm' => ['nullable', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:3', Rule::unique('languages', 'code')],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }
}
