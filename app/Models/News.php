<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

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

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

