<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioTranslation extends Model
{
    use HasFactory;

    protected $table = 'portfolio_translations';

    protected $fillable = [
        'portfolio_id',
        'locale',
        'title',
        'who',
        'description',
        'target',
        'result',
    ];

    // Связь с основной моделью Portfolio
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
