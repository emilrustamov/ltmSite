<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    // Регистрация конверсий Medialibrary для WebP
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(90);
    }

    protected $table = 'news';

    protected $fillable = [
        'slug', 'image', 'status', 'published_at',
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'date',
    ];

    // Связь с переводами
    public function translations()
    {
        return $this->hasMany(NewsTranslation::class);
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
        return $this->belongsToMany(Categories::class, 'category_news', 'news_id', 'category_id')
            ->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

