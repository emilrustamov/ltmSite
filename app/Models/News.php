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
        'title_ru', 'title_en', 'title_tm',
        'content_ru', 'content_en', 'content_tm',
        'excerpt_ru', 'excerpt_en', 'excerpt_tm',
    ];

    protected $casts = [
        'status' => 'boolean',
        'published_at' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

