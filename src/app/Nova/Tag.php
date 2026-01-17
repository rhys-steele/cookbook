<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Tag extends Resource
{
    public static $model = \App\Models\Tag::class;

    public static $title = 'name';

    public static $search = ['slug', 'name'];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Name')->rules('required', 'max:255'),
            Slug::make('Slug')->from('Name')->rules('required', 'max:255', 'unique:tags,slug,{{resourceId}}'),
            BelongsToMany::make('Recipes'),
        ];
    }
}
