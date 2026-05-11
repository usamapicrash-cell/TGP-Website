<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_settings', function (Blueprint $table) {
            $table->id();
            
            // --- PAGE CONTROLS ---
            $table->boolean('hero_status')->default(1);      // 1 = Show, 0 = Hide
            $table->boolean('breadform_status')->default(1); // 1 = Show, 0 = Hide
            
            // --- SEO SECTION ---
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // --- HERO SECTION ---
            $table->string('hero_h1')->nullable();
            $table->string('hero_h4')->nullable(); 
            $table->text('hero_desc')->nullable();
            $table->string('hero_img')->nullable();

            // --- STORY SECTION ---
            $table->string('story_subtitle')->nullable();
            $table->string('story_h2')->nullable();
            $table->text('story_p1')->nullable();
            $table->text('story_p2')->nullable();
            $table->string('story_img')->nullable();

            // --- CHECKLIST LEFT ---
            $table->text('checklist_left')->nullable();       
            $table->string('checklist_left_icon')->nullable(); 
            $table->string('checklist_left_color')->nullable(); 

            // --- CHECKLIST RIGHT ---
            $table->text('checklist_right')->nullable();
            $table->string('checklist_right_icon')->nullable(); 
            $table->string('checklist_right_color')->nullable(); 

            // --- STATS BADGE (Floating) ---
            $table->string('stats_count')->nullable(); 
            $table->string('stats_label')->nullable(); 

            // --- SERVICE LOCATIONS ---
            $table->text('service_locations')->nullable();

            // --- CTA BUTTONS ---
            $table->string('cta_text')->nullable(); 
            $table->string('cta_link')->nullable(); 
            $table->string('cta_bg_color')->nullable(); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_settings');
    }
};