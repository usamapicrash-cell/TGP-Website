<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       // Services Page ki overall settings (SEO + Hero)
        // Page Settings (Hero, SEO, Intro Section)
        Schema::create('service_settings', function (Blueprint $table) {
            $table->id();
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keywords')->nullable();
            
            // Hero & Toggles
            $table->boolean('hero_status')->default(1);
            $table->boolean('breadform_status')->default(1);
            $table->string('hero_h1')->nullable();
            $table->string('hero_h4')->nullable();
            $table->text('hero_desc')->nullable();
            $table->string('hero_img')->nullable();

            // Intro Section (What We Do part)
            $table->string('intro_subtitle')->nullable(); // Mini Desc type
            $table->string('intro_heading')->nullable();  // Bold Heading
            $table->text('intro_main_desc')->nullable();   // Long description
            $table->timestamps();
        });

        // Services Items (Residential, Commercial, etc.)
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable(); // e.g. COMMERCIAL
            $table->string('heading');           // Your Vision...
            $table->string('short_desc')->nullable(); // WE DO EVERYTHING...
            $table->text('full_description')->nullable(); 
            $table->string('image');
            
            // Left Column
            $table->string('left_heading')->nullable(); // e.g. Finishes & Designs
            $table->text('items_left')->nullable();     // Comma separated list
            
            // Right Column
            $table->string('right_heading')->nullable(); // e.g. Unique Projects
            $table->text('items_right')->nullable();    // Comma separated list
            
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
