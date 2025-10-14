<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Portfolio extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $table = "portfolio";

    protected $fillable = [
        'slug', 'photo', 'url_button', 'when', 'status', 'is_main_page', 'ordering',
    ];

    protected $casts = [
        'status' => 'boolean',
        'is_main_page' => 'boolean',
        'ordering' => 'integer',
        'when' => 'date',
    ];

    // Связь с переводами
    public function translations()
    {
        return $this->hasMany(PortfolioTranslation::class);
    }

    // Получить перевод для конкретного языка
    public function translation($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->translations()->where('locale', $locale)->first();
    }

    // Связь с категориями
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_portfolio', 'portfolio_id', 'category_id')
            ->withTimestamps();
    }

    // Регистрация конверсий Medialibrary для WebP
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(90);
    }

    // Использовать slug как ключ маршрута
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
