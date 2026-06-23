<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery_items';

    protected $fillable = [
        'title',
        'image',
    ];

    public function getImageUrlAttribute()
    {
        if (! $this->image) {
            return null;
        }

        if (preg_match('/^https?:\/\//', $this->image)) {
            return $this->image;
        }

        return asset('gallery-images/' . $this->image);
    }
}
