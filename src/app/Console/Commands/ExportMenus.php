<?php

namespace App\Console\Commands;

use App\Models\Edition;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Export Menus to JSON
 *
 * Exports all curated menus for a given edition to a JSON file.
 * Menus are compositions of recipes designed for ingredient overlap and prep efficiency.
 *
 * Usage:
 *   php artisan export:menus      # Defaults to v1
 *   php artisan export:menus v2   # Export a specific edition
 *
 * Output: exports/json/menus.{edition}.json
 */
class ExportMenus extends Command
{
    protected $signature = 'export:menus {edition=v1}';

    protected $description = 'Export curated menus to JSON for book production';

    /**
     * Export menus to JSON.
     *
     * Each menu includes its items (recipes) organized by course.
     * This data drives the Snap experience's shopping list aggregation.
     */
    public function handle(): int
    {
        $editionSlug = $this->argument('edition');

        // Find the edition or fail loudly
        $edition = Edition::where('slug', $editionSlug)->firstOrFail();

        // Get all menus with their items and the associated recipes.
        // Menus are curated sets designed like a restaurant menu.
        $menus = $edition->menus()
            ->with(['items.recipe'])
            ->get()
            ->map(fn ($menu) => [
                'id' => $menu->id,                      // Stable ID for internal tools
                'slug' => $menu->slug,                  // Permanent. QR codes depend on this.
                'name' => $menu->name,
                'description' => $menu->description,    // "Why this menu works"
                'published_at' => $menu->published_at?->toIso8601String(),
                'items' => $menu->items->map(fn ($item) => [
                    'course' => $item->course->value,   // MenuCourse enum
                    'recipe_id' => $item->recipe->id,
                    'recipe_slug' => $item->recipe->slug,
                    'recipe_name' => $item->recipe->name,
                ]),
            ]);

        // Build the export payload
        $output = [
            'schema_version' => '1.0',
            'edition' => $editionSlug,
            'exported_at' => now()->toIso8601String(),
            'count' => $menus->count(),
            'menus' => $menus,
        ];

        // Write to exports/json/menus.{edition}.json
        $basePath = config('content.exports_path');
        $path = "{$basePath}/json/menus.{$editionSlug}.json";
        File::ensureDirectoryExists(dirname($path));
        File::put($path, json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("Exported {$menus->count()} menus to {$path}");

        return Command::SUCCESS;
    }
}
