<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    use HasFactory;

    protected $table = 'about_settings';

    protected $fillable = [
        // Toggles
        'hero_status', 
        'breadform_status', 
        
        // SEO
        'meta_title', 
        'meta_description', 
        'meta_keywords',
        
        // Hero Section
        'hero_h1', 
        'hero_h4', 
        'hero_desc', 
        'hero_img',
        
        // Story Section
        'story_subtitle', 
        'story_h2', 
        'story_p1', 
        'story_p2', 
        'story_img',
        
        // Checklist Left
        'checklist_left', 
        'checklist_left_icon', 
        'checklist_left_color',
        
        // Checklist Right
        'checklist_right', 
        'checklist_right_icon', 
        'checklist_right_color',
        
        // Stats & Locations
        'stats_count', 
        'stats_label', 
        'service_locations',
        
        // CTA Button
        'cta_text', 
        'cta_link', 
        'cta_bg_color',

        'team_subtitle', 'team_title', 'team_description',
        'team_stat_1_value', 'team_stat_1_label',
        'team_stat_2_value', 'team_stat_2_label'
    ];

    /**
     * Cast attributes to specific types.
     */
    protected $casts = [
        'hero_status' => 'boolean',
        'breadform_status' => 'boolean',
    ];

    /**
     * Accessor: Left Checklist ko comma se split karke array mein convert karna
     * Usage in Blade: @foreach($about->left_items as $item)
     */
    public function getLeftItemsAttribute()
    {
        return $this->checklist_left ? array_map('trim', explode(',', $this->checklist_left)) : [];
    }

    /**
     * Accessor: Right Checklist ko array mein convert karna
     * Usage in Blade: @foreach($about->right_items as $item)
     */
    public function getRightItemsAttribute()
    {
        return $this->checklist_right ? array_map('trim', explode(',', $this->checklist_right)) : [];
    }

    /**
     * Helper: Locations ko array mein convert karna agar dots ya commas se separated hon
     */
    public function getLocationsListAttribute()
    {
        return $this->service_locations ? array_map('trim', explode('|', $this->service_locations)) : [];
    }
}