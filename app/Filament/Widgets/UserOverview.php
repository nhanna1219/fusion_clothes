<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class UserOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            Stat::make("Top-Selling Product", $this->getTopSellingProduct())
                ->description('Most sold product')
                ->descriptionIcon('heroicon-o-star', IconPosition::Before)
                ->color('success'),
            Stat::make("Revenue", "$ " . $this->calculateTotalRevenue())
                ->description('Total revenue from paid orders')
                ->descriptionIcon('heroicon-o-banknotes', IconPosition::Before)
                ->color('success'),
            Stat::make("Average Order Value", "$ " . number_format($this->calculateAverageOrderValue(), 2))
                ->description('Average value of paid orders')
                ->descriptionIcon('heroicon-o-calculator', IconPosition::Before)
                ->color('success'),
        ];
    }

    protected function calculateTotalRevenue()
    {
        return Order::join('payment_details', 'orders.id', '=', 'payment_details.order_id')
            ->where('payment_details.status', 'Paid')
            ->sum('orders.total');
    }

    protected function getTopSellingProduct()
    {
        $topProduct = OrderDetail::join('product_variants', 'order_details.product_variant_id', '=', 'product_variants.id')
            ->join('products', 'product_variants.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->groupBy('products.id', 'products.name')
            ->orderBy('total_quantity', 'desc')
            ->first();

        return $topProduct ? $topProduct->name : 'N/A';
    }
    protected function calculateAverageOrderValue()
    {
        $totalRevenue = Order::join('payment_details', 'orders.id', '=', 'payment_details.order_id')
            ->where('payment_details.status', 'Paid')
            ->sum('orders.total');

        $totalOrders = Order::whereHas('paymentDetail', function($query) {
            $query->where('status', 'Paid');
        })->count();

        return $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;
    }
}
