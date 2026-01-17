<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Menu Model
 *
 * Curated meal compositions designed like a restaurant menu.
 * Each menu groups recipes by course for ingredient overlap and prep efficiency.
 *
 * Slugs are permanent once QR codes exist.
 */
class Menu extends Model
{
    /** @use HasFactory<\Database\Factories\MenuFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'edition_id',
        'slug',          // Permanent per edition. QR codes depend on this.
        'name',
        'description',   // "Why this menu works"
        'published_at',
    ];

    /**
     * Type-cast attributes to their proper types.
     */
    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    /**
     * Get the edition this menu belongs to.
     */
    public function edition(): BelongsTo
    {
        return $this->belongsTo(Edition::class);
    }

    /**
     * Get the menu items (course + recipe combinations).
     *
     * Each menu item defines which recipe plays which course role.
     */
    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }
}
