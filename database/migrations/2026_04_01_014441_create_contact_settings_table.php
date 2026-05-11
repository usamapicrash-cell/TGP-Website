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
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();
            // Hero Toggle & Content
            $table->boolean('is_hero_visible')->default(true);
            $table->string('hero_heading')->nullable();
            $table->string('hero_subheading')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            // Contact Info
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->text('map_iframe')->nullable();
            // Estimate Section
            $table->string('estimate_title')->nullable();
            $table->text('estimate_description')->nullable();
            // Social Media & Footer
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('telegram')->nullable();
            $table->string('social_follow_text')->nullable(); // "Follow us for our latest..."
            $table->text('footer_short_desc')->nullable();
            // Service Area Footer
            $table->string('service_area_title')->nullable(); // "Proudly Serving the Greater Portland Area"
            $table->string('service_area_para')->nullable(); // "Proudly Serving the Greater Portland Area"
            $table->text('service_area_footer_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};
