<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ClearOrderUnPaid extends Command
{
    const UNPAID_STATUS = 'Not paid yet';
    const VNP_METHODS = 'VNPAY';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:clear-unpaid-orders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $unpaidOrders = Order::where('payment_status', 'like', self::UNPAID_STATUS)
        ->where('payment_method', 'like', self::VNP_METHODS)
        ->get();
        echo '====================== START DELETED ====================== \\n';
        foreach ($unpaidOrders as $order) {
            $bookDateOrder = $order->created_at->format('Y-m-d');
            $today = Carbon::now()->format('Y-m-d');

            if ($today > $bookDateOrder) {
                $this->deleteAllOrderDetails($order->id);
                $order->delete();
            }
        }

        echo '====================== DELETED SUCCESSFULLY ======================';
    }

    private function deleteAllOrderDetails($id)
    {
        $orderDetais = OrderDetails::where('order_id', '=', $id)->get();
       foreach ($orderDetais as $order) {
        $order->delete();
       }
    }
}
