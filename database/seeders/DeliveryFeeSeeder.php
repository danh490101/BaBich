<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DeliveryFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('delivery_fees')->delete();

        DB::table('delivery_fees')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Miền Bắc',
                'price'=> '45000',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Miền Trung',
                'price'=> '30000',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Miền Nam',
                'price'=>'15000'
            ),
        ));
    }
}
