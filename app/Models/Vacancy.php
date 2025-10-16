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
        'slug', 'status', 'location', 'employment_type',
        'salary_from', 'salary_to', 'experience_level',
        'custom_work_format', 'custom_language', 'custom_education', 'custom_source',
        'city_id', 'custom_city', 'work_experience_requirements', 'education_requirements',
        'professional_plans', 'additional_info', 'is_featured', 'application_deadline',
        'published_at'
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_featured' => 'boolean',
        'salary_from' => 'decimal:2',
        'salary_to' => 'decimal:2',
        'application_deadline' => 'date',
        'published_at' => 'datetime',
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

    // Связь с должностями (Many-to-Many)
    public function jobPositions()
    {
        return $this->belongsToMany(JobPosition::class, 'vacancy_job_positions');
    }

    // Связь с техническими навыками (Many-to-Many)
    public function technicalSkills()
    {
        return $this->belongsToMany(TechnicalSkill::class, 'vacancy_technical_skills');
    }

    // Связь с форматами работы (Many-to-Many)
    public function workFormats()
    {
        return $this->belongsToMany(WorkFormat::class, 'vacancy_work_formats');
    }

    // Связь с языками (Many-to-Many)
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'vacancy_languages');
    }

    // Связь с городом (Many-to-One)
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Связь с заявками (если понадобится в будущем)
    // public function applications()
    // {
    //     return $this->hasMany(VacancyApplication::class);
    // }

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

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
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
        return $this->status;
    }
}