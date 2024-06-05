<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        return [
            Stat::make("Users", User::query()->count())
                ->description('All users')
                ->descriptionIcon('heroicon-o-users', IconPosition::Before)
                ->color('success'),
            Stat::make("Orders", Order::query()->count())
                ->description('All orders')
                ->descriptionIcon('heroicon-o-shopping-bag', IconPosition::Before)
                ->color('success'),
            Stat::make("Products", Product::query()->count())
                ->description('All products')
                ->descriptionIcon('heroicon-o-bolt', IconPosition::Before)
                ->color('success'),
        ];
    }
}
