<?php

namespace App\Models;

use App\Enums\MenuCourse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * MenuItem Model
 *
 * Associates a recipe with a menu and defines its course role.
 * "Steak Frites" in "Date Night Menu" as "main" course.
 *
 * Uses MenuCourse enum, not Recipe Course enum.
 */
class MenuItem extends Model
{
    /** @use HasFactory<\Database\Factories\MenuItemFactory> */
    use HasFactory;

    /**
     * Mass-assignable attributes.
     */
    protected $fillable = [
        'menu_id',
        'recipe_id',
        'course',      // MenuCourse enum: starter/main/side/dessert/drink
        'sort_order',
    ];

    /**
     * Type-cast attributes to their proper types.
     */
    protected function casts(): array
    {
        return [
            'course' => MenuCourse::class,
        ];
    }

    /**
     * Get the menu this item belongs to.
     */
    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    /**
     * Get the recipe for this menu item.
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
