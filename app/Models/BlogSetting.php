<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogSetting extends Model
{
    protected $fillable = [
        'title', 'meta_description', 'meta_keywords', 
        'hero_status', 'hero_heading', 'hero_subheading', 
        'hero_description', 'hero_image', 'breadform_status',
        'blog_subtitle', 'blog_heading' // Naye fields
    ];
}