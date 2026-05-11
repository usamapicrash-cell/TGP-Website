<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'home_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 1. SEO Section
        'seo_title',
        'seo_meta_description',
        'seo_meta_keywords',

        // 2. Hero Section
        'hero_heading',
        'hero_subheading',
        'hero_description',
        'hero_image',
        'hero_star_label1',
        'hero_star_label2',
        'hero_star_label3',
        'hero_star_label4',
        'hero_btn1_text',
        'hero_btn1_link',
        'hero_btn2_text',
        'hero_btn2_link',

        // 3. About Section
        'about_heading',
        'about_description',
        'about_image_1',
        'about_image_2',
        'about_cta_text',
        'about_cta_btn_text',
        'about_cta_btn_link',

        // 4. Service Section
        'service_heading',
        'service_text',
        'service_cta_text',
        'service_cta_btn_text',
        'service_cta_btn_link',

        // 5. Project Section
        'project_heading',
        'project_text',

        // 6. Why Choose Us Section
        'why_choose_heading',
        'why_choose_text',
        'why_choose_badges', // JSON field
        'why_choose_side_image',
        'why_choose_cta_text',
        'why_choose_cta_btn_text',
        'why_choose_cta_btn_link',

        // 7. Contractor Form Section
        'contractor_heading',
        'contractor_subheading',
        'contractor_description',
        'contractor_bullets', // JSON field
        'contractor_btn1_text',
        'contractor_btn1_link',
        'contractor_btn2_text',
        'contractor_btn2_link',
    ];

    /**
     * The attributes that should be cast to native types.
     * * Iska faida ye hai k aap array pass karenge aur ye khud database mein JSON bna dega
     * aur jab fetch karenge to wapis array mil jayega.
     *
     * @var array
     */
    protected $casts = [
        'why_choose_badges' => 'array',
        'contractor_bullets' => 'array',
    ];
}