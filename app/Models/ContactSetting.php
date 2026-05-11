<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model {
    protected $fillable = [
        'is_hero_visible', 'hero_heading', 'hero_subheading', 'hero_description', 'hero_image',
        'meta_title', 'meta_description', 'meta_keywords', 'phone', 'whatsapp', 'email', 
        'address', 'map_iframe', 'estimate_title', 'estimate_description', 'facebook', 
        'instagram', 'twitter', 'linkedin', 'telegram', 'social_follow_text', 
        'footer_short_desc', 'service_area_title', 'service_area_para', 'service_area_footer_text'
    ];
    protected $casts = ['is_hero_visible' => 'boolean'];
}