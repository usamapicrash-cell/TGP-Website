<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GallerySetting extends Model
{
    protected $fillable = [
        'title', 'meta_description', 'meta_keywords', 
        'hero_status', 'hero_heading', 'hero_subheading', 
        'hero_description', 'hero_image', 'breadform_status', 
        'portfolio_subtitle', 'portfolio_heading'
    ];
}