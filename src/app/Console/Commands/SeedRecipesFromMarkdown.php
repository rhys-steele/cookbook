<?php

namespace App\Console\Commands;

use App\Enums\Course;
use App\Enums\RecipeStatus;
use App\Enums\RecipeType;
use App\Models\Edition;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Yaml\Yaml;

/**
 * Seed Recipes from Markdown
 *
 * This command imports recipe "seeds" from the content/recipes/ directory.
 * Seeds are minimal markdown files capturing recipe ideas before full authoring.
 *
 * Usage:
 *   php artisan seed:recipes          # Import all, update existing
 *   php artisan seed:recipes --fresh  # Delete all recipes first, then import
 */
class SeedRecipesFromMarkdown extends Command
{
    protected $signature = 'seed:recipes {--fresh : Delete all recipes first}';

    protected $description = 'Seed recipes from content/recipes/*.md files';

    /**
     * Import recipe seeds from markdown files.
     *
     * Reads all .md files from content/recipes/, parses their YAML frontmatter,
     * and creates or updates Recipe records. Tags are automatically created and synced.
     *
     * Note: raw_idea maps to the `idea` field, not `description`.
     * Keep seed notes separate from polished book copy.
     */
    public function handle(): int
    {
        // Use configured path, not hardcoded
        $path = config('content.recipes_path');

        if (! File::isDirectory($path)) {
            $this->error("Recipes path not found: {$path}");

            return Command::FAILURE;
        }

        $files = File::glob("{$path}/*.md");

        // Fresh start? Nuke everything and rebuild.
        if ($this->option('fresh')) {
            Recipe::query()->delete();
            $this->info('Cleared existing recipes.');
        }

        // Ensure v1 edition exists. This is our default for the first book.
        $edition = Edition::firstOrCreate(
            ['slug' => 'v1'],
            ['name' => 'Version 1', 'is_active' => true]
        );

        $count = 0;

        foreach ($files as $file) {
            // Skip the template file - it's just a reference.
            if (str_contains($file, '_TEMPLATE')) {
                continue;
            }

            $content = File::get($file);
            $parsed = $this->parseFrontmatter($content);

            // If we can't parse it, warn and move on. Don't crash.
            if (! $parsed) {
                $this->warn("Could not parse: {$file}");

                continue;
            }

            // Create or update the recipe.
            // Slug + edition_id is the composite unique key.
            // Raw markdown content goes to raw fields, not curated ones.
            $recipe = Recipe::updateOrCreate(
                [
                    'slug' => $parsed['slug'],
                    'edition_id' => $edition->id,
                ],
                [
                    'name' => $parsed['name'],
                    'type' => RecipeType::from($parsed['type']),
                    'course' => Course::from($parsed['course']),
                    'status' => RecipeStatus::from($parsed['status'] ?? 'seed'),
                    'hero' => $parsed['hero'] ?? false,
                    'idea' => $parsed['raw_idea'] ?? null,           // Raw notes → idea field
                    'ingredients_raw' => $parsed['ingredients'] ?? null, // If present in markdown
                    'method_raw' => $parsed['method'] ?? null,           // If present in markdown
                ]
            );

            // Sync tags. Create them if they don't exist yet.
            // Tag names are auto-generated from slugs (e.g., 'uses-herb-butter' -> 'Uses Herb Butter')
            // Note: `uses-*` tags are just labels for browsing. Real dependencies are in recipe_staple.
            $tagIds = collect($parsed['tags'] ?? [])->map(function ($tagSlug) {
                return Tag::firstOrCreate(
                    ['slug' => $tagSlug],
                    ['name' => str($tagSlug)->replace('-', ' ')->title()->toString()]
                )->id;
            });

            $recipe->tags()->sync($tagIds);

            $count++;
            $this->line("Imported: {$parsed['name']}");
        }

        $this->info("Seeded {$count} recipes.");

        return Command::SUCCESS;
    }

    /**
     * Parse YAML frontmatter and body sections from a markdown file.
     *
     * Expects the format:
     * ---
     * name: Recipe Name
     * slug: recipe-name
     * ...
     * ---
     *
     * ## Raw idea:
     * The concept goes here.
     *
     * ## Ingredients:
     * - 2 onions
     * - 3 cloves garlic
     *
     * ## Method:
     * 1. Do this
     * 2. Then that
     *
     * @param  string  $content  The full markdown file content
     * @return array|null Parsed frontmatter + body sections, or null if parsing fails
     */
    private function parseFrontmatter(string $content): ?array
    {
        // Match YAML frontmatter between --- delimiters
        if (! preg_match('/^---\n(.+?)\n---\n(.*)$/s', $content, $matches)) {
            return null;
        }

        $frontmatter = Yaml::parse($matches[1]);
        $body = $matches[2];

        // Extract the "Raw idea" section
        if (preg_match('/## Raw idea:\s*\n\n(.+?)(?:\n##|$)/s', $body, $match)) {
            $frontmatter['raw_idea'] = trim($match[1]);
        }

        // Extract the "Ingredients" section (if present)
        if (preg_match('/## Ingredients:\s*\n\n(.+?)(?:\n##|$)/s', $body, $match)) {
            $frontmatter['ingredients'] = trim($match[1]);
        }

        // Extract the "Method" section (if present)
        if (preg_match('/## Method:\s*\n\n(.+?)(?:\n##|$)/s', $body, $match)) {
            $frontmatter['method'] = trim($match[1]);
        }

        return $frontmatter;
    }
}
