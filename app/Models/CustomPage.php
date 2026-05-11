<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    protected $fillable = [
        'page_name', 'slug', 'meta_title', 'meta_description', 'meta_keywords',
        'hero_status', 'hero_h1', 'hero_h4', 'hero_desc', 'hero_img',
        'content_json', 'status'
    ];

    // Auto-convert JSON to Array
    protected $casts = [
        'content_json' => 'array',
        'hero_status' => 'boolean',
        'status' => 'boolean',
    ];
}