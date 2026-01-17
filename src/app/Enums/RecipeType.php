<?php

namespace App\Enums;

/**
 * Recipe Type
 *
 * The fundamental distinction in our cookbook system.
 * - Staple: Foundational components (herb butter, chicken stock)
 * - Dish: Full recipes that build on staples (steak frites, pho ga)
 */
enum RecipeType: string
{
    case Dish = 'dish';
    case Staple = 'staple';
}
