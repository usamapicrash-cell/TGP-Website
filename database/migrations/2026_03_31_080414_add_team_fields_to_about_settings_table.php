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
        Schema::table('about_settings', function (Blueprint $table) {
            $table->string('team_subtitle')->nullable(); // e.g., EXPERT HANDS
            $table->string('team_title')->nullable(); // e.g., Meet The Glass Experts
            $table->text('team_description')->nullable();
            
            // Stats Boxes
            $table->string('team_stat_1_value')->nullable(); // e.g., 15+
            $table->string('team_stat_1_label')->nullable(); // e.g., DEDICATED SPECIALISTS
            $table->string('team_stat_2_value')->nullable(); // e.g., 100%
            $table->string('team_stat_2_label')->nullable(); // e.g., SAFETY COMPLIANCE
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_settings', function (Blueprint $table) {
            //
        });
    }
};
