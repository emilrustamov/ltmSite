<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ru',
        'name_en', 
        'name_tm',
        'slug',
        'code',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    // Скоуп для активных языков
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Скоуп для сортировки
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name_ru');
    }

    // Связь с заявками кандидатов
    public function applications()
    {
        return $this->belongsToMany(Application::class, 'application_languages');
    }

    // Использовать id как ключ маршрута
    public function getRouteKeyName()
    {
        return 'id';
    }
}