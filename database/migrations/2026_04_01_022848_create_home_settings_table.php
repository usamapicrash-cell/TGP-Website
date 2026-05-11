<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('home_settings', function (Blueprint $table) {
            $table->id();
            
            // 1. SEO Section
            $table->string('seo_title')->nullable();
            $table->text('seo_meta_description')->nullable();
            $table->text('seo_meta_keywords')->nullable();
            
            // 2. Hero Section (No Status, Two CTAs)
            $table->string('hero_heading')->nullable();
            $table->string('hero_subheading')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('hero_star_label1')->nullable();
            $table->string('hero_star_label2')->nullable();
            $table->string('hero_star_label3')->nullable();
            $table->string('hero_star_label4')->nullable();

            $table->string('hero_btn1_text')->nullable();
            $table->string('hero_btn1_link')->nullable();
            $table->string('hero_btn2_text')->nullable();
            $table->string('hero_btn2_link')->nullable();

            // 3. About Section (Two Images + CKEditor + CTA)
            $table->string('about_heading')->nullable();
            $table->longText('about_description')->nullable(); // CKEditor compatible
            $table->string('about_image_1')->nullable();
            $table->string('about_image_2')->nullable();
            $table->text('about_cta_text')->nullable();
            $table->string('about_cta_btn_text')->nullable();
            $table->string('about_cta_btn_link')->nullable();

            // 4. Service Section (Heading + Text + CTA)
            $table->string('service_heading')->nullable();
            $table->text('service_text')->nullable();
            $table->text('service_cta_text')->nullable();
            $table->string('service_cta_btn_text')->nullable();
            $table->string('service_cta_btn_link')->nullable();

            // 5. Project Section
            $table->string('project_heading')->nullable();
            $table->text('project_text')->nullable();

            // 6. Why Choose Us Section (Grid Structure based on Image)
            $table->string('why_choose_heading')->nullable();
            $table->text('why_choose_text')->nullable();
            $table->json('why_choose_badges')->nullable(); // Multi: icon, heading, desc
            $table->string('why_choose_side_image')->nullable(); // Side/Below image
            $table->text('why_choose_cta_text')->nullable();
            $table->string('why_choose_cta_btn_text')->nullable();
            $table->string('why_choose_cta_btn_link')->nullable();

            // 7. Contractor Form Section (Heading, Heading 2, Desc, Bullets, 2 CTAs)
            $table->string('contractor_heading')->nullable();
            $table->string('contractor_subheading')->nullable();
            $table->text('contractor_description')->nullable();
            $table->json('contractor_bullets')->nullable(); // JSON for bullet points
            $table->string('contractor_btn1_text')->nullable();
            $table->string('contractor_btn1_link')->nullable();
            $table->string('contractor_btn2_text')->nullable();
            $table->string('contractor_btn2_link')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_settings');
    }
};