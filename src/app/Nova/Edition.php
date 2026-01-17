<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Edition extends Resource
{
    public static $model = \App\Models\Edition::class;

    public static $title = 'name';

    public static $search = ['slug', 'name'];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Slug')->rules('required', 'max:255', 'unique:editions,slug,{{resourceId}}'),
            Text::make('Name')->rules('required', 'max:255'),
            Boolean::make('Is Active'),
            HasMany::make('Recipes'),
            HasMany::make('Menus'),
        ];
    }
}
