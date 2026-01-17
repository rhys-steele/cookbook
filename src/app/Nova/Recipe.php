<?php

namespace App\Nova;

use App\Enums\Course;
use App\Enums\RecipeStatus;
use App\Enums\RecipeType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

/**
 * Recipe Nova Resource
 *
 * The main authoring interface for recipes. Handles both dishes and staples.
 * Slug protection is critical here — we can't break QR codes.
 */
class Recipe extends Resource
{
    /**
     * The model the resource corresponds to.
     */
    public static $model = \App\Models\Recipe::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     */
    public static $search = [
        'name',
        'slug',
        'idea',
    ];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Edition')
                ->rules('required'),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            // Slug: editable on create, locked after publishing
            Slug::make('Slug')
                ->from('Name')
                ->rules('required', 'max:255')
                ->creationRules([
                    Rule::unique('recipes', 'slug')
                        ->where('edition_id', $request->get('edition') ?? $this->edition_id),
                ])
                ->updateRules([
                    Rule::unique('recipes', 'slug')
                        ->where('edition_id', $this->edition_id)
                        ->ignore($this->id),
                ])
                ->readonly(fn () => $this->status === RecipeStatus::Published)
                ->help('Permanent once published. QR codes depend on this.'),

            Select::make('Type')
                ->options(collect(RecipeType::cases())->mapWithKeys(fn ($case) => [$case->value => ucfirst($case->value)]))
                ->displayUsingLabels()
                ->rules('required'),

            Select::make('Course')
                ->options(collect(Course::cases())->mapWithKeys(fn ($case) => [$case->value => ucfirst($case->value)]))
                ->displayUsingLabels()
                ->rules('required'),

            Select::make('Status')
                ->options(collect(RecipeStatus::cases())->mapWithKeys(fn ($case) => [$case->value => ucfirst($case->value)]))
                ->displayUsingLabels()
                ->default(RecipeStatus::Seed->value),

            Boolean::make('Hero')
                ->help('Will this recipe have hero photography?'),

            Number::make('Servings')->nullable(),
            Number::make('Prep Time', 'prep_time')->nullable()->help('Minutes'),
            Number::make('Cook Time', 'cook_time')->nullable()->help('Minutes'),
            Text::make('Difficulty')->nullable(),

            // ─────────────────────────────────────────────────────────────
            // RAW CAPTURE FIELDS
            // Quick jot, messy, unstructured. Author convenience.
            // ─────────────────────────────────────────────────────────────

            Heading::make('Raw Capture'),

            Markdown::make('Idea')
                ->nullable()
                ->hideFromIndex()
                ->help('Raw seed notes. Brain dump. Not for publication.'),

            Textarea::make('Ingredients (Raw)', 'ingredients_raw')
                ->nullable()
                ->hideFromIndex()
                ->rows(8)
                ->help('Quick ingredient list, one per line. Transform into structured Ingredients later.'),

            Textarea::make('Method (Raw)', 'method_raw')
                ->nullable()
                ->hideFromIndex()
                ->rows(8)
                ->help('Quick steps, unpolished. Refine into Method field later.'),

            // ─────────────────────────────────────────────────────────────
            // CURATED FIELDS
            // Polished, structured, publication-ready.
            // ─────────────────────────────────────────────────────────────

            Heading::make('Curated Content'),

            Markdown::make('Description')
                ->nullable()
                ->hideFromIndex()
                ->help('Polished intro for the book/app.'),

            Markdown::make('Method')
                ->nullable()
                ->hideFromIndex()
                ->help('Polished steps. Markdown.'),

            Markdown::make('Shortcut')
                ->nullable()
                ->hideFromIndex()
                ->help('The quick path. Every recipe needs one.'),

            Markdown::make('Notes')
                ->nullable()
                ->hideFromIndex()
                ->help('Storage, swaps, make-ahead tips.'),

            DateTime::make('Published At')
                ->readonly()
                ->hideFromIndex()
                ->help('Auto-set when status changes to Published.'),

            // ─────────────────────────────────────────────────────────────
            // RELATIONSHIPS
            // ─────────────────────────────────────────────────────────────

            Heading::make('Structured Data'),

            // Curated ingredients - proper records with amount/unit/name
            HasMany::make('Ingredients'),

            BelongsToMany::make('Tags'),

            // This is the source of truth for dependencies
            BelongsToMany::make('Staples', 'staples', self::class),
        ];
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
