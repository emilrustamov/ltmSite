<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyTranslation extends Model
{
    use HasFactory;

    protected $table = 'vacancy_translations';

    protected $fillable = [
        'vacancy_id',
        'locale',
        'title',
        'description',
        'requirements',
        'responsibilities',
        'benefits',
        'company_name',
        'company_description',
    ];

    // Связь с основной моделью Vacancy
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}