<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Media Model
 *
 * Photo references for recipes.
 * Hero photos get printed in the book. The rest live in the Snap experience.
 *
 * Note: Media is Phase 1.5 - defer until authoring is solid.
 */
class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'recipe_id',
        'path',      // Local file path for now
        'alt',       // Alt text for accessibility
        'is_hero',   // Is this the hero photo for the book?
    ];

    /**
     * Type-cast attributes to their proper types.
     */
    protected function casts(): array
    {
        return [
            'is_hero' => 'boolean',
        ];
    }

    /**
     * Get the recipe this media belongs to.
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
