<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vacancy extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    // Регистрация конверсий Medialibrary для WebP
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(90);
    }

    protected $table = 'vacancies';

    protected $fillable = [
        'slug', 'image', 'status', 'is_featured', 'location', 'employment_type',
        'salary_from', 'salary_to', 'experience_level', 'application_deadline', 'published_at'
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'salary_from' => 'decimal:2',
        'salary_to' => 'decimal:2',
        'application_deadline' => 'date',
        'published_at' => 'date',
    ];

    // Связь с переводами
    public function translations()
    {
        return $this->hasMany(VacancyTranslation::class);
    }

    // Получить перевод для конкретного языка
    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    // Связь с категориями (если понадобится в будущем)
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_vacancy', 'vacancy_id', 'category_id')
            ->withTimestamps();
    }

    // Связь с заявками (если понадобится в будущем)
    public function applications()
    {
        return $this->hasMany(VacancyApplication::class);
    }

    // Использовать slug как ключ маршрута
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Скоупы для фильтрации
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    // Аксессоры
    public function getFormattedSalaryAttribute()
    {
        if ($this->salary_from && $this->salary_to) {
            return number_format($this->salary_from, 0, ',', ' ') . ' - ' . number_format($this->salary_to, 0, ',', ' ') . ' ₽';
        } elseif ($this->salary_from) {
            return 'от ' . number_format($this->salary_from, 0, ',', ' ') . ' ₽';
        } elseif ($this->salary_to) {
            return 'до ' . number_format($this->salary_to, 0, ',', ' ') . ' ₽';
        }
        return 'По договоренности';
    }

    public function getIsActiveAttribute()
    {
        return $this->status && 
               ($this->application_deadline === null || $this->application_deadline >= now());
    }
}