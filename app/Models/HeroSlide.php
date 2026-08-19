<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image',
        'button_text',
        'button_url',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}