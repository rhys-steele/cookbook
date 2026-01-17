<?php

namespace App\Console\Commands;

use App\Enums\RecipeStatus;
use App\Models\Edition;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

/**
 * Export Recipes to JSON
 *
 * Exports recipes for a given edition to a JSON file.
 * This is the single source of truth for book typesetting and external integrations.
 *
 * Usage:
 *   php artisan export:recipes                # Published recipes, v1
 *   php artisan export:recipes v2             # Published recipes, v2
 *   php artisan export:recipes --status=draft # Draft recipes only
 *   php artisan export:recipes --all          # All recipes regardless of status
 *
 * Output: exports/json/recipes.{edition}.json
 */
class ExportRecipes extends Command
{
    protected $signature = 'export:recipes
        {edition=v1 : Edition slug to export}
        {--status= : Filter by status (seed, draft, testing, published)}
        {--all : Export all recipes regardless of status}';

    protected $description = 'Export recipes to JSON for book production and integrations';

    /**
     * Export recipes to JSON.
     *
     * Includes stable IDs for internal tooling. Slugs are for URLs,
     * but IDs are useful for tracking across systems.
     */
    public function handle(): int
    {
        $editionSlug = $this->argument('edition');

        // Find the edition or blow up if it doesn't exist
        $edition = Edition::where('slug', $editionSlug)->firstOrFail();

        // Build the query with eager loading
        $query = $edition->recipes()->with(['ingredients', 'tags', 'staples']);

        // Filter by status unless --all is passed
        if ($this->option('all')) {
            // No filter - export everything
        } elseif ($status = $this->option('status')) {
            $query->where('status', $status);
        } else {
            // Default: published only
            $query->where('status', RecipeStatus::Published);
        }

        $recipes = $query->get()->map(fn ($recipe) => [
            'id' => $recipe->id,                  // Stable ID for internal tools
            'slug' => $recipe->slug,              // Permanent. QR codes depend on this.
            'name' => $recipe->name,
            'type' => $recipe->type->value,       // 'dish' or 'staple'
            'course' => $recipe->course->value,   // 'main', 'starter', etc.
            'status' => $recipe->status->value,
            'hero' => $recipe->hero,              // Will this get hero photography?
            'servings' => $recipe->servings,
            'prep_time' => $recipe->prep_time,
            'cook_time' => $recipe->cook_time,
            'description' => $recipe->description,
            'method' => $recipe->method,
            'shortcut' => $recipe->shortcut,      // Every recipe needs a quick path
            'notes' => $recipe->notes,
            'published_at' => $recipe->published_at?->toIso8601String(),
            'ingredients' => $recipe->ingredients->map(fn ($i) => [
                'name' => $i->name,
                'amount' => $i->amount,
                'unit' => $i->unit,
                'notes' => $i->notes,
            ]),
            'tags' => $recipe->tags->pluck('slug'),
            'staples' => $recipe->staples->pluck('slug'),  // Real dependencies from pivot
        ]);

        // Build the export payload with schema version
        $output = [
            'schema_version' => '1.0',
            'edition' => $editionSlug,
            'exported_at' => now()->toIso8601String(),
            'count' => $recipes->count(),
            'recipes' => $recipes,
        ];

        // Write to exports/json/recipes.{edition}.json
        $basePath = config('content.exports_path');
        $path = "{$basePath}/json/recipes.{$editionSlug}.json";
        File::ensureDirectoryExists(dirname($path));
        File::put($path, json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $this->info("Exported {$recipes->count()} recipes to {$path}");

        return Command::SUCCESS;
    }
}
