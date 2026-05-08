<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', 'company_name', 'position', 'start_date', 'end_date', 'description'
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
