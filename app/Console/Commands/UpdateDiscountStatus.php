<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Discount;
use Illuminate\Console\Command;

class UpdateDiscountStatus extends Command
{
  
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discount:update-status';

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
        $discounts = Discount::all();
        foreach ($discounts as $discount) {
            $expireDay = $discount->expire_day;
            $createdDay = $discount->created_at;

            $date = $createdDay->format('Y-m-d');
            $expiredDay = new Carbon($date);
            $expiredDay->addDays($expireDay);
            $today = Carbon::now()->format('Y-m-d');

            if (!$expiredDay->gte($today)) {
                $discount->status = 0;
            } else {
                $discount->status = 1;
            }

            $discount->save();
        }
        return Command::SUCCESS;
    }
}
