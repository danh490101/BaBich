<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public const OPTION_DAYS = [
        'day' => 1,
        'month' => 2,
        'year' => 3,
    ];

    public $orders = [];

    /**
     * Display a listing of the resource.

     */
    public function index(Request $request)
    {
        $order = Order::all();
        $categories = Category::all();
        $numberOrder = 0;
        foreach ($order as $or) {
            $numberOrder += 1;
        }

        $numberStatis = 0;
        foreach ($order as $ord) {
            if ($ord->status == 1) {
                $numberStatis += $ord->totalamount;
            }
        }

        $user = User::all();
        $numberUser = 0;
        foreach ($user as $us) {
            $numberUser += 1;
        }

        $now = Carbon::now()->format('d-m-Y');

        $orders = $this->orders;

        $orderGroupByMonthOfYear = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupByRaw('MONTH(created_at)')
            ->whereYear('created_at', date('Y'))
            ->get();

        $orderByMonth = $orderGroupByMonthOfYear->pluck('count')->toArray();

        $monthLabels = [];
        foreach ($orderGroupByMonthOfYear as $data) {
            $month = $data->month;
            $monthName = date('F', mktime(0, 0, 0, $month, 1));
            $monthLabels[$month] = $monthName;
        }

        $monthLabels = array_values($monthLabels);

        $currentYear = Carbon::now()->year;

        $importData = DB::table('warehouse_detail')
            ->whereYear('created_at', $currentYear)
            ->selectRaw('MONTH(created_at) as month, SUM(price * quantity) as import_value')
            ->groupBy('month')
            ->get();

        $monthImportLabels = [];
        foreach ($importData as $import) {
            $month = $import->month;
            $monthName = date('F', mktime(0, 0, 0, $month, 1));
            $monthImportLabels[$month] = $monthName;
        }

        $monthImportLabels = array_values($monthImportLabels);
        $importData = $importData->pluck('import_value')->toArray();

        return view('admin.statistical.index', compact('numberOrder', 'numberUser', 'numberStatis', 'now', 'categories', 'orders', 'orderByMonth', 'monthLabels', 'importData', 'monthImportLabels'));
    }

    /**
     * Show the form for creating a new resource.
     *

     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function show(Order $order)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function getQuantityOrder(Order $order)
    {
    }

    public function search(Request $request)
    {
        $data = $request->all();
        $options['optionDate'] = $this->getOptionDatetime($data);

        $orders = Order::where('order_date', $options['optionDate'])->get();

        $this->orders = $orders;

        return redirect()->route('admin.statistical.index')->with('orders', $orders);
    }

    public function getOptionDatetime($data)
    {
        if ($data['optionDatetimeType']) {
            $date = new \DateTime($data['optionDatetime']);
            $value = self::OPTION_DAYS[(string) $data['optionDatetimeType']];
            switch ($value) {
                case 2:
                    $month = $date->format('m');
                    return $month;
                case 3:
                    $year = $date->format('Y');
                    return $year;
                default:
                    $date = $date->format('Y-m-d');
                    return $date;
            }
        }
    }
}
