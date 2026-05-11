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
        Schema::create('custom_pages', function (Blueprint $table) {
            $table->id();
            // SEO Fields
            $table->string('page_name'); // For admin reference
            $table->string('slug')->unique(); 
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Hero Section Fields
            $table->boolean('hero_status')->default(1);
            $table->string('hero_h1')->nullable();
            $table->string('hero_h4')->nullable();
            $table->text('hero_desc')->nullable();
            $table->string('hero_img')->nullable();

            // Dynamic Content Layout (JSON)
            // Isme store hoga: [{type: 'left_img_right_text', data: {...}}, {type: 'map', data: {...}}]
            $table->longText('content_json')->nullable(); 

            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_pages');
    }
};
