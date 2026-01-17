<?php

/**
 * Content Configuration
 *
 * Paths for recipe seeds and exports.
 * The Laravel app lives in src/, content lives at repo root.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Recipe Seeds Path
    |--------------------------------------------------------------------------
    |
    | Where markdown seed files live. Default assumes Laravel is in src/
    | and content is at the repo root.
    |
    */
    'recipes_path' => env('CONTENT_RECIPES_PATH', dirname(base_path()).'/content/recipes'),

    /*
    |--------------------------------------------------------------------------
    | Exports Path
    |--------------------------------------------------------------------------
    |
    | Where JSON exports are written.
    |
    */
    'exports_path' => env('CONTENT_EXPORTS_PATH', dirname(base_path()).'/exports'),

];
