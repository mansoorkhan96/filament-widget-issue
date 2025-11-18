<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $groupId = $this->pageFilters['group_id'] ?? null;

        $usersCount = User::query()
            ->when($groupId, fn ($query) => $query->where('group_id', $groupId))
            ->count();

        return [
            Stat::make('Users', $usersCount),
        ];
    }
}
