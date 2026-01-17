<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class Menu extends Resource
{
    public static $model = \App\Models\Menu::class;

    public static $title = 'name';

    public static $search = ['slug', 'name'];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Edition')->rules('required'),
            Text::make('Name')->rules('required', 'max:255'),
            Slug::make('Slug')->from('Name')->rules('required', 'max:255'),
            Markdown::make('Description')->nullable(),
            DateTime::make('Published At')->readonly(),
            HasMany::make('Items', 'items', MenuItem::class),
        ];
    }
}
