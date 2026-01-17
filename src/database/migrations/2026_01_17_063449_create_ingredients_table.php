<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Create ingredients table for structured recipe ingredients.
     *
     * Key decision: amount and unit are strings, not numeric.
     * Why? Because "1/2", "a pinch", and "2–3" are all valid quantities.
     */
    public function up(): void
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')->constrained()->cascadeOnDelete();
            $table->string('amount')->nullable();         // "2", "1/2", "a pinch"
            $table->string('unit')->nullable();           // "cups", "tbsp", "cloves"
            $table->string('name');                       // "onion, diced"
            $table->text('notes')->nullable();            // "or shallots"
            $table->unsignedInteger('sort_order')->default(0); // No one wants their salt before their onions
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};
