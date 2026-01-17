<?php

namespace App\Models;

use App\Enums\Course;
use App\Enums\RecipeStatus;
use App\Enums\RecipeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Recipe Model
 *
 * The heart of the cookbook. Recipes can be either:
 * - Staples: foundational components (herb butter, chicken stock)
 * - Dishes: full recipes that build on staples
 *
 * This is software you can eat.
 */
class Recipe extends Model
{
    /** @use HasFactory<\Database\Factories\RecipeFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     *
     * Slugs are permanent once QR codes exist - treat with care.
     * Uniqueness is per-edition, not global.
     *
     * Note the raw vs curated pattern:
     * - idea / ingredients_raw / method_raw = quick capture, messy, author convenience
     * - description / ingredients relation / method = polished, structured, for export
     */
    protected $fillable = [
        'edition_id',
        'slug',              // Permanent per edition. Do not change after QR generation.
        'name',
        'type',              // RecipeType: dish or staple
        'course',            // Course: main, starter, side, etc.
        'status',            // RecipeStatus: seed -> draft -> testing -> published
        'hero',              // Will this recipe have hero photography?
        'servings',
        'prep_time',         // Minutes
        'cook_time',         // Minutes
        'difficulty',

        // Raw capture fields (author convenience)
        'idea',              // Raw seed notes, messy brain dump
        'ingredients_raw',   // Quick ingredient list, one per line
        'method_raw',        // Quick steps, unpolished

        // Curated fields (publication-ready)
        'description',       // Polished intro for book/app
        'method',            // Polished steps (markdown)
        'shortcut',          // The quick path - every recipe needs one
        'notes',             // Storage, swaps, make-ahead

        'published_at',
    ];

    /**
     * Type-cast attributes to their proper types.
     *
     * Using enums for type safety and database consistency.
     * Laravel 12 style: casts() method instead of $casts property.
     */
    protected function casts(): array
    {
        return [
            'hero' => 'boolean',
            'type' => RecipeType::class,
            'course' => Course::class,
            'status' => RecipeStatus::class,
            'published_at' => 'datetime',
        ];
    }

    /**
     * Model boot logic.
     *
     * Auto-set published_at when status changes to published.
     */
    protected static function booted(): void
    {
        static::saving(function (Recipe $recipe) {
            // Set published_at the first time we publish
            if ($recipe->isDirty('status') && $recipe->status === RecipeStatus::Published) {
                $recipe->published_at ??= now();
            }
        });
    }

    /**
     * Get the edition this recipe belongs to.
     *
     * Every recipe is tied to an edition (v1, v2, etc.) for version control.
     * This is how we ensure old books with QR codes don't break when we publish v2.
     */
    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    /**
     * Get the ingredients for this recipe.
     *
     * Ordered by sort_order so they appear in the correct sequence.
     * No one wants their salt before their onions.
     */
    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class)->orderBy('sort_order');
    }

    /**
     * Get the tags for this recipe.
     *
     * Tags are for categorization and filtering. They are NOT the source
     * of truth for staple dependencies — use the staples() relationship for that.
     *
     * `uses-*` tags are optional human labels for browsing/search.
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Get the staples used in this dish.
     *
     * This is THE source of truth for recipe dependencies.
     * "Steak Frites" uses "Herb Butter" is stored here, not in tags.
     *
     * Self-referential many-to-many relationship on the Recipe model.
     */
    public function staples(): BelongsToMany
    {
        return $this->belongsToMany(
            Recipe::class,
            'recipe_staple',
            'recipe_id',
            'staple_id'
        );
    }

    /**
     * Get the dishes that use this staple.
     *
     * The inverse of staples(). If this recipe is a staple, which dishes use it?
     * "Herb Butter" would show "Steak Frites", "Roast Chicken", etc.
     */
    public function usedInDishes(): BelongsToMany
    {
        return $this->belongsToMany(
            Recipe::class,
            'recipe_staple',
            'staple_id',
            'recipe_id'
        );
    }

    /**
     * Get the media (photos) for this recipe.
     *
     * Hero photos get printed in the book. The rest live in the Snap experience.
     * Note: Media is Phase 1.5 - defer until authoring is solid.
     */
    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }
}
