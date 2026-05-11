<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'meta_title',
        'meta_desc',
        'meta_keywords',
        'hero_status',
        'breadform_status',
        'hero_h1',
        'hero_h4',
        'hero_desc',
        'hero_img',
        'intro_subtitle',
        'intro_heading',
        'intro_main_desc'
    ];

    // Boolean fields ko cast karna zaroori hai taake true/false sahi chale
    protected $casts = [
        'hero_status' => 'boolean',
        'breadform_status' => 'boolean',
    ];
}