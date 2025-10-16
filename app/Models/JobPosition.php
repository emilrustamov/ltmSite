<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ru', 'name_en', 'name_tm', 'slug', 'is_active', 'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Связь с вакансиями (Many-to-Many)
    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class, 'vacancy_job_positions');
    }

    // Скоуп для активных позиций
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Скоуп для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name_ru');
    }
}