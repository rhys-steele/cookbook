<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Edition Model
 *
 * Version tracking for the cookbook.
 * v1, v2, etc. Each book edition gets its own slug namespace.
 *
 * This is how we prevent v2 from breaking v1 QR codes.
 */
class Edition extends Model
{
    /** @use HasFactory<\Database\Factories\EditionFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'slug',       // v1, v2, v3
        'name',       // Version 1, Version 2
        'is_active',
    ];

    /**
     * Type-cast attributes to their proper types.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get the recipes for this edition.
     *
     * Each edition has its own set of recipes with unique slugs.
     */
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    /**
     * Get the menus for this edition.
     *
     * Each edition has its own curated menus.
     */
    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
