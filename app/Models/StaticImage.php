<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StaticImage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['filename'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('webp')
             ->format('webp')
             ->quality(90);
    }
}
