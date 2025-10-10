<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $table = "categories";

    protected $fillable = [
        'slug',
        'name_ru',
        'name_en',
        'name_tm',
    ];

    // Связь с портфолио
    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'category_portfolio', 'category_id', 'portfolio_id')
            ->withTimestamps();
    }

    // Использовать slug как ключ маршрута
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
