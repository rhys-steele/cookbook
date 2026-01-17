<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Ingredient extends Resource
{
    public static $model = \App\Models\Ingredient::class;

    public static $title = 'name';

    public static $search = ['name'];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Recipe')->rules('required'),
            Text::make('Amount')->nullable(),
            Text::make('Unit')->nullable(),
            Text::make('Name')->rules('required', 'max:255'),
            Textarea::make('Notes')->nullable(),
            Number::make('Sort Order')->default(0),
        ];
    }
}
