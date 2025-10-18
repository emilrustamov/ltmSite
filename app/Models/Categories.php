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
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Связь с переводами
    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class, 'category_id');
    }

    // Получить перевод для конкретного языка
    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    // Связь с портфолио
    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'category_portfolio', 'category_id', 'portfolio_id')
            ->withTimestamps();
    }

    // Связь с новостями
    public function news()
    {
        return $this->belongsToMany(News::class, 'category_news', 'category_id', 'news_id')
            ->withTimestamps();
    }

    // Использовать slug как ключ маршрута
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
