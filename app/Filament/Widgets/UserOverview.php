<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        return [
            Stat::make("Users", User::query()->count())
                ->description('All users from the database')
                ->color('info'),
            Stat::make("Orders", Order::query()->count())
                ->description('All orders from the database')
                ->color('info'),
            Stat::make("Products", Product::query()->count())
                ->description('All products from the database')
                ->color('info'),
        ];
    }
}
