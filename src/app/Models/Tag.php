<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Tag Model
 *
 * Recipe categorization and filtering.
 * Tags are for browsing, not dependencies.
 *
 * uses-* tags are optional human labels; recipe_staple pivot is the real truth.
 */
class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'slug',  // kebab-case
        'name',  // Title Case
    ];

    /**
     * Get the recipes that have this tag.
     *
     * Tags are many-to-many with recipes.
     */
    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class);
    }
}
