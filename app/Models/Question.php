<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'question',
        'answer',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
