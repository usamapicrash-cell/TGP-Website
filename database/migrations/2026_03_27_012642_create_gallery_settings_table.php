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
        Schema::create('gallery_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            
            // Hero Section
            $table->boolean('hero_status')->default(1); // 1 for On, 0 for Off
            $table->string('hero_heading')->nullable();
            $table->string('hero_subheading')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            
            // Breadform
            $table->boolean('breadform_status')->default(1);
            
            // Portfolio Section Headings
            $table->string('portfolio_subtitle')->nullable();
            $table->string('portfolio_heading')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_settings');
    }
};
