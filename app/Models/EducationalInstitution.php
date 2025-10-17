<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalInstitution extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'institution_name', 'degree', 'faculty', 'start_date', 'end_date', 'description'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Связь с заявкой (Many-to-One)
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
