<?php

namespace App\Http\Livewire;

use App\Models\OrderDetails;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class RevenueChart extends Component
{
    public function render(): View
    {
        $endDate = Carbon::now()->endOfDay();
        $startDate = Carbon::now()->subDays(6)->startOfDay();

        $data = OrderDetails::join('orders', 'order_details.order_id', '=', 'orders.id')
            ->selectRaw('DATE(orders.created_at) as date, SUM(order_details.totalamount) as revenue')
            ->whereBetween('orders.created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $data->pluck('date');
        $revenue= $data->pluck('revenue');

        return view('livewire.revenue-chart', [
            'dates' => $dates,
            'revenue' => $revenue,
        ]);
    }
}
