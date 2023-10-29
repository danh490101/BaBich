<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TopSellingProduct extends Component
{
    public $month = '';

    public $year = '';

    protected $listeners = [
        'updated-month' => '$refresh',
        'updated-year' => '$refresh',
    ];

    public function mount()
    {
        $now = Date::now();
        $this->month = $now->format('m');
        $this->year = $now->format('Y');
    }

    public function updatedMonth()
    {
        $this->emit('updated-month');
    }

    public function updatedYear()
    {
        $this->emit('updated-year');
    }

    protected function getTopSellingProduct($month, $year)
    {
        return Order::select('products.*', DB::raw('SUM(order_details.quantity) as total_quantity'))
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->whereYear('orders.created_at', $year)
            ->whereMonth('orders.created_at', $month)
            ->groupBy('products.id')
            ->orderByDesc('total_quantity')
            ->take(10)
            ->get();
    }

    public function render()
    {
        $topSellingProducts = $this->getTopSellingProduct($this->month, $this->year);

        return view('livewire.top-selling-product', [
            'topSellingProducts' => $topSellingProducts,
        ]);
    }
}
