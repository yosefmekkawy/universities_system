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
        Schema::create('colleages_years', function (Blueprint $table) {
            $table->id();
            $table->foreignId('collage_id')->constrained('colleages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('year_id')->constrained('years')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleages_years');
    }
};
