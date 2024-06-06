<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RevenueChart extends ChartWidget
{
    protected static ?string $heading = 'Revenue Stats';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        return [
            'labels' => $this->getMonthLabels(),
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $this->getMonthlyRevenueData(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ],
            ],
        ];
    }

    protected function getMonthLabels(): array
    {
        return [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
    }

    protected function getMonthlyRevenueData(): array
    {
        $monthlyRevenue = Order::join('payment_details', 'orders.id', '=', 'payment_details.order_id')
            ->where('payment_details.status', 'Paid')
            ->select(
                DB::raw('YEAR(orders.created_at) as year'),
                DB::raw('MONTH(orders.created_at) as month'),
                DB::raw('SUM(orders.total) as total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $revenueData = array_fill(0, 12, 0); 

        foreach ($monthlyRevenue as $data) {
            $revenueData[$data->month - 1] = $data->total; 
        }

        return $revenueData;
    }

    protected function getType(): string
    {
        return 'line';
    }
}
