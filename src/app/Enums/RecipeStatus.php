<?php

namespace App\Enums;

/**
 * Recipe Status
 *
 * The journey from idea to book:
 * - Seed: Just an idea captured in markdown
 * - Draft: Being actively written and tested
 * - Testing: Recipe is complete, being verified
 * - Published: Ready for the book and Snap experience
 *
 * Only Published recipes appear in exports (by default).
 */
enum RecipeStatus: string
{
    case Seed = 'seed';
    case Draft = 'draft';
    case Testing = 'testing';
    case Published = 'published';
}
