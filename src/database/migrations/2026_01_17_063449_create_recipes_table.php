<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Create recipes table - the heart of the cookbook.
     *
     * Key design decisions:
     * - Composite unique (edition_id, slug): Slugs unique per edition, not globally
     * - Raw vs Curated fields: idea/ingredients_raw/method_raw for quick capture,
     *   description/method for polished publication copy
     * - published_at: Auto-set when status becomes 'published'
     */
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('edition_id')->constrained()->cascadeOnDelete();
            $table->string('slug');                           // Permanent per edition. QR codes depend on this.
            $table->string('name');
            $table->string('type');                           // RecipeType enum: dish or staple
            $table->string('course');                         // Course enum: main, starter, side, etc.
            $table->string('status')->default('seed');        // RecipeStatus enum: seed -> draft -> testing -> published
            $table->boolean('hero')->default(false);          // Will this recipe have hero photography?
            $table->unsignedInteger('servings')->nullable();
            $table->unsignedInteger('prep_time')->nullable(); // Minutes
            $table->unsignedInteger('cook_time')->nullable(); // Minutes
            $table->string('difficulty')->nullable();         // Easy, Medium, Hard (optional for now)

            // Raw capture fields (author convenience)
            $table->text('idea')->nullable();                 // Raw seed notes, messy brain dump
            $table->text('ingredients_raw')->nullable();      // Quick ingredient list, one per line
            $table->text('method_raw')->nullable();           // Quick steps, unpolished

            // Curated fields (publication-ready)
            $table->text('description')->nullable();          // Polished intro for book/app
            $table->text('method')->nullable();               // Polished steps (markdown)
            $table->text('shortcut')->nullable();             // The quick path - every recipe needs one
            $table->text('notes')->nullable();                // Storage, swaps, make-ahead

            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            // Composite unique index: slugs are unique per edition
            $table->unique(['edition_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
