<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Create menus table for curated meal compositions.
     * Menus are like restaurant menus: designed for ingredient overlap and prep efficiency.
     *
     * Like recipes, slugs are unique per edition (composite key).
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('edition_id')->constrained()->cascadeOnDelete();
            $table->string('slug');                      // Permanent per edition. QR codes depend on this.
            $table->string('name');
            $table->text('description')->nullable();     // "Why this menu works"
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
        Schema::dropIfExists('menus');
    }
};
