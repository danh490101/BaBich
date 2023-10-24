<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Component;

class OrderChart extends Component
{
    public string $groupBy = 'created_at';

    public function render(): View
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $data->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('Y-m-d');
        })->toArray();

        $counts = $data->pluck('count')->toArray();

        return view('livewire.order-chart', [
            'dates' => $dates,
            'counts' => $counts,
        ]);
    }
}
