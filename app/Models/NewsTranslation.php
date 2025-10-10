<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    use HasFactory;

    protected $table = 'news_translations';

    protected $fillable = [
        'news_id',
        'locale',
        'title',
        'content',
        'excerpt',
    ];

    // Связь с основной моделью News
    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
