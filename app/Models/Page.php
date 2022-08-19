<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'template',
        'title',
        'slug',
        'about',
        'cover',
        'source',
        'document_en_url',
        'document_es_url',
        'alt_phone'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
