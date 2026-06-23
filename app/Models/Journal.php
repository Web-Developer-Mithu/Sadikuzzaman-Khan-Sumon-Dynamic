<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $table = 'journals';

    protected $fillable = [
        'title',
        'slug',
        'journal_name',
        'authors',
        'affiliation',
        'role',
        'publication_date',
        'volume',
        'issue',
        'pages',
        'doi',
        'abstract',
        'keywords',
        'image',
        'pdf',
        'status',
        'published_at'
    ];

    protected $dates = [
        'publication_date',
        'published_at'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('journal-images/' . $this->image) : null;
    }

    public function getPdfUrlAttribute()
    {
        return $this->pdf ? asset('journal-files/' . $this->pdf) : null;
    }
}
