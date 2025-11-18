<?php

namespace App\Filament\Pages;

use App\Models\Group;
use Filament\Forms\Components\Select;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Select::make('group_id')
                            ->live()
                            ->searchable()
                            ->preload()
                            ->options(fn () => Group::query()->pluck('name', 'id')),
                    ]),
            ]);
    }
}
