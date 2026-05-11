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
        Schema::create('review_settings', function (Blueprint $table) {
            $table->id();
            // SEO
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            
            // Hero Section
            $table->boolean('hero_status')->default(1);
            $table->string('hero_heading')->nullable();
            $table->string('hero_subheading')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->boolean('breadform_status')->default(1);

            // Reviews Section
            $table->string('review_heading')->nullable();
            $table->text('review_description')->nullable();
            $table->text('google_widget_code')->nullable(); // For raw JS/HTML

            // Promise CTA Bar
            $table->text('promise_text')->nullable();
            $table->string('promise_link')->default('#');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_settings');
    }
};
