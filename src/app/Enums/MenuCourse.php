<?php

namespace App\Enums;

/**
 * Menu Course Types (for Menu Items)
 *
 * What role does this recipe play in a curated menu?
 * Different from Recipe Course — menus are dinner-party compositions.
 * You won't see "lunch" or "snack" here because menus are structured meals.
 */
enum MenuCourse: string
{
    case Starter = 'starter';
    case Main = 'main';
    case Side = 'side';
    case Dessert = 'dessert';
    case Drink = 'drink';
}
