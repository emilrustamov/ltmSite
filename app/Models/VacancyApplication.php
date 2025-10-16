<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class VacancyApplication extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    // Регистрация конверсий Medialibrary для WebP
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(90);
    }

    protected $table = 'vacancy_applications';

    protected $fillable = [
        'vacancy_id',
        'name',
        'email',
        'phone',
        'city',
        'experience_years',
        'current_position',
        'expected_salary',
        'cover_letter',
        'status',
        'notes',
    ];

    protected $casts = [
        'experience_years' => 'integer',
        'expected_salary' => 'decimal:2',
        'status' => 'string',
    ];

    // Связь с вакансией
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    // Скоупы для фильтрации
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeReviewed($query)
    {
        return $query->where('status', 'reviewed');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    // Аксессоры
    public function getStatusBadgeAttribute()
    {
        $badges = [
            'new' => 'bg-primary',
            'reviewed' => 'bg-info',
            'accepted' => 'bg-success',
            'rejected' => 'bg-danger',
        ];

        return $badges[$this->status] ?? 'bg-secondary';
    }

    public function getStatusTextAttribute()
    {
        $texts = [
            'new' => 'Новая',
            'reviewed' => 'Рассмотрена',
            'accepted' => 'Принята',
            'rejected' => 'Отклонена',
        ];

        return $texts[$this->status] ?? 'Неизвестно';
    }

    public function getFormattedSalaryAttribute()
    {
        if ($this->expected_salary) {
            return number_format($this->expected_salary, 0, ',', ' ') . ' ₽';
        }
        return 'Не указана';
    }
}
