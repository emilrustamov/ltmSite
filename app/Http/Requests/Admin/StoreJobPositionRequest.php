<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobPositionRequest extends FormRequest
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
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'responsibilities_ru' => ['nullable', 'string'],
            'responsibilities_en' => ['nullable', 'string'],
            'responsibilities_tm' => ['nullable', 'string'],
            'employment_type' => ['nullable', 'in:full-time,part-time,contract,temporary,internship,volunteer'],
            'work_format_id' => ['nullable', 'exists:work_formats,id'],
            'salary_ru' => ['nullable', 'string', 'max:255'],
            'salary_en' => ['nullable', 'string', 'max:255'],
            'salary_tm' => ['nullable', 'string', 'max:255'],
            'requirements_ru' => ['nullable', 'string'],
            'requirements_en' => ['nullable', 'string'],
            'requirements_tm' => ['nullable', 'string'],
            'conditions_ru' => ['nullable', 'string'],
            'conditions_en' => ['nullable', 'string'],
            'conditions_tm' => ['nullable', 'string'],
            'ordering' => ['nullable', 'integer', 'min:0'],
            'technical_skills' => ['nullable', 'array'],
            'technical_skills.*' => ['exists:technical_skills,id'],
            'new_technical_skills' => ['nullable', 'array'],
            'new_technical_skills.*.name_ru' => ['required_with:new_technical_skills', 'string', 'max:255'],
            'new_technical_skills.*.name_en' => ['nullable', 'string', 'max:255'],
            'new_technical_skills.*.name_tm' => ['nullable', 'string', 'max:255'],
        ];
    }
}
