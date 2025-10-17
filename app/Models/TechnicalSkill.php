<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ru',
        'name_en', 
        'name_tm',
        'slug',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Скоуп для активных навыков
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Скоуп для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('name_ru');
    }

    // Связь с должностями
    public function jobPositions()
    {
        return $this->belongsToMany(JobPosition::class, 'job_position_technical_skills')
                    ->withPivot('importance')
                    ->withTimestamps();
    }

    // Связь с заявками кандидатов
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'application_technical_skills')
                    ->withPivot('level', 'experience_years', 'notes')
                    ->withTimestamps();
    }

    // Использовать slug как ключ маршрута
    public function getRouteKeyName()
    {
        return 'slug';
    }
}