<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ru',
        'name_en',
        'name_tm',
        'slug',
        'sort_order',
        'is_active',
        'responsibilities_ru',
        'responsibilities_en',
        'responsibilities_tm',
        'employment_type',
        'work_format_id',
        'salary_ru',
        'salary_en',
        'salary_tm',
        'requirements_ru',
        'requirements_en',
        'requirements_tm',
        'conditions_ru',
        'conditions_en',
        'conditions_tm',
        'status',
        'ordering'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'status' => 'boolean',
        'ordering' => 'integer'
    ];

    // Скоуп для активных должностей
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Скоуп для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name_ru');
    }

    // Скоуп для отображения на главной странице
    public function scopeMainPage($query)
    {
        return $query->where('status', true)
            ->orderBy('ordering');
    }

    // Скоуп для активных и опубликованных вакансий
    public function scopePublished($query)
    {
        return $query->where('status', true)
            ->where('is_active', true);
    }

    // Связь с заявками кандидатов
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'application_job_positions');
    }

    // Связь с техническими навыками
    public function technicalSkills()
    {
        return $this->belongsToMany(TechnicalSkill::class, 'job_position_technical_skills');
    }

    // Связь с форматом работы
    public function workFormat()
    {
        return $this->belongsTo(WorkFormat::class);
    }

    // Использовать id как ключ маршрута
    public function getRouteKeyName()
    {
        return 'id';
    }
}