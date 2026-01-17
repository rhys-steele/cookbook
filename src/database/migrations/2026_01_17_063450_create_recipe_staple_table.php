<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Create recipe_staple pivot table.
     * This is THE source of truth for recipe dependencies.
     * "Steak Frites" uses "Herb Butter" is stored here.
     *
     * Self-referential: both foreign keys point to recipes table.
     */
    public function up(): void
    {
        Schema::create('recipe_staple', function (Blueprint $table) {
            $table->foreignId('recipe_id')->constrained('recipes')->cascadeOnDelete();
            $table->foreignId('staple_id')->constrained('recipes')->cascadeOnDelete();
            $table->primary(['recipe_id', 'staple_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipe_staple');
    }
};
