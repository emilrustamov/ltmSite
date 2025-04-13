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

    // Преобразование JSON-полей в массивы + добавлено поле photo
    protected $casts = [
        'title'       => 'array',
        'who'         => 'array',
        'description' => 'array',
        'target'      => 'array',
        'result'      => 'array',
        'status'      => 'boolean',
        'ordering'    => 'integer',
        'photo'       => 'string',
    ];

    // Пример связи с категориями
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'category_portfolio', 'portfolio_id', 'category_id')
                    ->withTimestamps();
    }

    // Регистрация конверсий Medialibrary
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')
             ->format('webp')    // конвертирует в формат WebP
             ->quality(90);      // можно указать качество конверсии
    }
}
