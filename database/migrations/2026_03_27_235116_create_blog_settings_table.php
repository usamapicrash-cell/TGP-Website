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
        Schema::create('blog_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->boolean('hero_status')->default(1);
            $table->string('hero_heading')->nullable();
            $table->string('hero_subheading')->nullable();
            $table->longText('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->boolean('breadform_status')->default(1);
            $table->string('blog_subtitle')->nullable()->default('Expert Insights & Updates');
            $table->string('blog_heading')->nullable()->default('Latest From Our Blog');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_settings');
    }
};
