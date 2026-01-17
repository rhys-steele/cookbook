<?php

namespace App\Enums;

/**
 * Course Types (for Recipes)
 *
 * Where does this recipe fit when you're browsing or categorizing?
 * Note: 'staple' exists here for structural consistency.
 */
enum Course: string
{
    case Staple = 'staple';
    case Starter = 'starter';
    case Side = 'side';
    case Main = 'main';
    case Dessert = 'dessert';
    case Lunch = 'lunch';
    case Snack = 'snack';
}
