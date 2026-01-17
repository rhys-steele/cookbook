<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Ingredient Model
 *
 * Structured ingredient records for recipes.
 * Created from ingredients_raw text during refinement.
 *
 * Amount and unit are strings because "1/2", "a pinch", and "2–3" are valid.
 */
class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'recipe_id',
        'amount',      // "2", "1/2", "a pinch"
        'unit',        // "cups", "tbsp", "cloves"
        'name',        // "onion, diced"
        'notes',       // "or shallots"
        'sort_order',  // No one wants their salt before their onions
    ];

    /**
     * Get the recipe this ingredient belongs to.
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
