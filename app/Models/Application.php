<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ANMail;

class Application extends Model
{
    use HasFactory;

    protected $table = 'applications';

    protected $fillable = [
        'name', 'surname', 'email', 'phone', 'date_of_birth', 'expected_salary', 'personal_info', 'contact_info',
        'linkedin_url', 'github_url', 'city_id', 'custom_city', 'registration_address', 'source_id', 'custom_source',
        'work_format_id', 'custom_work_format', 'education_id', 'custom_education', 'custom_language', 'custom_technical_skill',
        'cv_file', 'professional_plans', 'other_notes', 'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'date_of_birth' => 'date',
    ];

    /**
     * Boot method для автоматической отправки писем
     */
    public static function boot() {
        parent::boot();

        static::created(function ($item) {
            try {
                // Загружаем все связи для email
                $item->load([
                    'city',
                    'source',
                    'workFormat',
                    'education',
                    'jobPositions',
                    'languages',
                    'technicalSkills',
                    'workExperiences',
                    'educationalInstitutions'
                ]);
                
                $adminEmail = "hr@ltm.studio";
                Mail::to($adminEmail)->send(new ANMail($item));
            } catch (\Exception $e) {
                // Логируем ошибку, но не прерываем сохранение
                \Log::error('Ошибка отправки почты для заявки: ' . $e->getMessage());
            }
        });
    }

    // Связь с городом (Many-to-One)
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Связь с источником (Many-to-One) - нужно создать модель Source
    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    // Связь с должностями (Many-to-Many)
    public function jobPositions()
    {
        return $this->belongsToMany(JobPosition::class, 'application_job_positions');
    }

    // Связь с техническими навыками (Many-to-Many)
    public function technicalSkills()
    {
        return $this->belongsToMany(TechnicalSkill::class, 'application_technical_skills')
                    ->withPivot('level', 'experience_years', 'notes')
                    ->withTimestamps();
    }

    // Связь с форматом работы (Many-to-One)
    public function workFormat()
    {
        return $this->belongsTo(WorkFormat::class);
    }

    // Связь с образованием (Many-to-One)
    public function education()
    {
        return $this->belongsTo(Education::class);
    }

    // Связь с опытом работы (One-to-Many)
    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    // Связь с учебными заведениями (One-to-Many)
    public function educationalInstitutions()
    {
        return $this->hasMany(EducationalInstitution::class);
    }

    // Связь с языками (Many-to-Many)
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'application_languages');
    }

    // Примечание: переводы не нужны для заявок кандидатов - это персональные данные

    // Скоупы для фильтрации
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

}