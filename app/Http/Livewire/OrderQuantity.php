<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderQuantity extends Component
{
    public $year = '';

    protected $listeners = [
        'updated-order-quantity-year' => '$refresh',
    ];

    public function mount()
    {
        $now = Date::now();
        $this->year = $now->format('Y');
    }

    public function updatedYear()
    {
        $this->emit('updated-order-quantity-year');
    }

    public function getMonthlyOrders($year)
    {
        return DB::table('orders')
            ->select(DB::raw('MONTH(created_at) AS month'), DB::raw('COUNT(*) AS total_orders'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
    }

    public function getQuarterlyOrders($year)
    {
        return DB::table('orders')
            ->select(DB::raw('QUARTER(created_at) AS quarter'), DB::raw('COUNT(*) AS total_orders'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('QUARTER(created_at)'))
            ->get();
    }

    public function getYearlyOrders($year)
    {
        return DB::table('orders')
            ->select(DB::raw('YEAR(created_at) AS year'), DB::raw('COUNT(*) AS total_orders'))
            ->whereYear('created_at', $year)
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();
    }

    public function render()
    {
        return view('livewire.order-quantity', [
            'monthlyOrders' => $this->getMonthlyOrders($this->year),
            'yearlyOrders' => $this->getYearlyOrders($this->year),
            'quarterlyOrders' => $this->getQuarterlyOrders($this->year),
        ]);
    }
}
