<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getImageUrlAttribute()
    {
        if (!$this->img) {
            return null;
        }

        if (preg_match('/^https?:\/\//', $this->img)) {
            return $this->img;
        }

        return asset('blog-images/'.$this->img); 
    }
}
