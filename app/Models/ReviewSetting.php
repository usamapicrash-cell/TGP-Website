<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSetting extends Model
{
    protected $fillable = [
        'title', 'meta_description', 'meta_keywords',
        'hero_status', 'hero_heading', 'hero_subheading', 'hero_description', 'hero_image',
        'breadform_status', 'review_heading', 'review_description', 
        'google_widget_code', 'promise_text', 'promise_link'
    ];
}