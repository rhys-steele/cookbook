<?php

namespace App\Nova;

use App\Enums\MenuCourse;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource;

class MenuItem extends Resource
{
    public static $model = \App\Models\MenuItem::class;

    public static $title = 'id';

    public static $search = ['id'];

    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Menu')->rules('required'),
            BelongsTo::make('Recipe')->rules('required'),
            Select::make('Course')
                ->options(collect(MenuCourse::cases())->mapWithKeys(fn ($case) => [$case->value => ucfirst($case->value)]))
                ->displayUsingLabels()
                ->rules('required'),
            Number::make('Sort Order')->default(0),
        ];
    }
}
