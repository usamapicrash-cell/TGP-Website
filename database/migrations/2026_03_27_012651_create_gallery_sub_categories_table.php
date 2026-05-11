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
        Schema::create('gallery_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_category_id')->constrained()->onDelete('cascade');
            $table->string('name'); // e.g., Windows
            $table->string('slug')->unique(); // e.g., windows
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_sub_categories');
    }
};
