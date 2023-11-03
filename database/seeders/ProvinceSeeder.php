<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('provinces')->delete();

        DB::table('provinces')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Hà Nội',
                    'type' => 'Thành phố Trung ương',
                    'delivery_fee_id' => 1,
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Hà Giang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            2 =>
                array (
                    'id' => 4,
                    'name' => 'Cao Bằng',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            3 =>
                array (
                    'id' => 6,
                    'name' => 'Bắc Kạn',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            4 =>
                array (
                    'id' => 8,
                    'name' => 'Tuyên Quang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            5 =>
                array (
                    'id' => 10,
                    'name' => 'Lào Cai',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            6 =>
                array (
                    'id' => 11,
                    'name' => 'Điện Biên',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            7 =>
                array (
                    'id' => 12,
                    'name' => 'Lai Châu',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            8 =>
                array (
                    'id' => 14,
                    'name' => 'Sơn La',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            9 =>
                array (
                    'id' => 15,
                    'name' => 'Yên Bái',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            10 =>
                array (
                    'id' => 17,
                    'name' => 'Hoà Bình',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            11 =>
                array (
                    'id' => 19,
                    'name' => 'Thái Nguyên',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            12 =>
                array (
                    'id' => 20,
                    'name' => 'Lạng Sơn',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            13 =>
                array (
                    'id' => 22,
                    'name' => 'Quảng Ninh',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            14 =>
                array (
                    'id' => 24,
                    'name' => 'Bắc Giang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            15 =>
                array (
                    'id' => 25,
                    'name' => 'Phú Thọ',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            16 =>
                array (
                    'id' => 26,
                    'name' => 'Vĩnh Phúc',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            17 =>
                array (
                    'id' => 27,
                    'name' => 'Bắc Ninh',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            18 =>
                array (
                    'id' => 30,
                    'name' => 'Hải Dương',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            19 =>
                array (
                    'id' => 31,
                    'name' => 'Hải Phòng',
                    'type' => 'Thành phố Trung ương',
                    'delivery_fee_id' => 1,
                ),
            20 =>
                array (
                    'id' => 33,
                    'name' => 'Hưng Yên',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            21 =>
                array (
                    'id' => 34,
                    'name' => 'Thái Bình',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            22 =>
                array (
                    'id' => 35,
                    'name' => 'Hà Nam',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            23 =>
                array (
                    'id' => 36,
                    'name' => 'Nam Định',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            24 =>
                array (
                    'id' => 37,
                    'name' => 'Ninh Bình',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 1,
                ),
            25 =>
                array (
                    'id' => 38,
                    'name' => 'Thanh Hóa',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            26 =>
                array (
                    'id' => 40,
                    'name' => 'Nghệ An',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            27 =>
                array (
                    'id' => 42,
                    'name' => 'Hà Tĩnh',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            28 =>
                array (
                    'id' => 44,
                    'name' => 'Quảng Bình',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            29 =>
                array (
                    'id' => 45,
                    'name' => 'Quảng Trị',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            30 =>
                array (
                    'id' => 46,
                    'name' => 'Thừa Thiên Huế',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            31 =>
                array (
                    'id' => 48,
                    'name' => 'Đà Nẵng',
                    'type' => 'Thành phố Trung ương',
                    'delivery_fee_id' => 2,
                ),
            32 =>
                array (
                    'id' => 49,
                    'name' => 'Quảng Nam',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            33 =>
                array (
                    'id' => 51,
                    'name' => 'Quảng Ngãi',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            34 =>
                array (
                    'id' => 52,
                    'name' => 'Bình Định',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            35 =>
                array (
                    'id' => 54,
                    'name' => 'Phú Yên',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            36 =>
                array (
                    'id' => 56,
                    'name' => 'Khánh Hòa',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            37 =>
                array (
                    'id' => 58,
                    'name' => 'Ninh Thuận',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            38 =>
                array (
                    'id' => 60,
                    'name' => 'Bình Thuận',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            39 =>
                array (
                    'id' => 62,
                    'name' => 'Kon Tum',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            40 =>
                array (
                    'id' => 64,
                    'name' => 'Gia Lai',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            41 =>
                array (
                    'id' => 66,
                    'name' => 'Đắk Lắk',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            42 =>
                array (
                    'id' => 67,
                    'name' => 'Đắk Nông',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            43 =>
                array (
                    'id' => 68,
                    'name' => 'Lâm Đồng',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 2,
                ),
            44 =>
                array (
                    'id' => 70,
                    'name' => 'Bình Phước',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            45 =>
                array (
                    'id' => 72,
                    'name' => 'Tây Ninh',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            46 =>
                array (
                    'id' => 74,
                    'name' => 'Bình Dương',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            47 =>
                array (
                    'id' => 75,
                    'name' => 'Đồng Nai',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            48 =>
                array (
                    'id' => 77,
                    'name' => 'Bà Rịa - Vũng Tàu',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            49 =>
                array (
                    'id' => 79,
                    'name' => 'Hồ Chí Minh',
                    'type' => 'Thành phố Trung ương',
                    'delivery_fee_id' => 3,
                ),
            50 =>
                array (
                    'id' => 80,
                    'name' => 'Long An',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            51 =>
                array (
                    'id' => 82,
                    'name' => 'Tiền Giang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            52 =>
                array (
                    'id' => 83,
                    'name' => 'Bến Tre',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            53 =>
                array (
                    'id' => 84,
                    'name' => 'Trà Vinh',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            54 =>
                array (
                    'id' => 86,
                    'name' => 'Vĩnh Long',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            55 =>
                array (
                    'id' => 87,
                    'name' => 'Đồng Tháp',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            56 =>
                array (
                    'id' => 89,
                    'name' => 'An Giang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            57 =>
                array (
                    'id' => 91,
                    'name' => 'Kiên Giang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            58 =>
                array (
                    'id' => 92,
                    'name' => 'Cần Thơ',
                    'type' => 'Thành phố Trung ương',
                    'delivery_fee_id' => 3,
                ),
            59 =>
                array (
                    'id' => 93,
                    'name' => 'Hậu Giang',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            60 =>
                array (
                    'id' => 94,
                    'name' => 'Sóc Trăng',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            61 =>
                array (
                    'id' => 95,
                    'name' => 'Bạc Liêu',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
            62 =>
                array (
                    'id' => 96,
                    'name' => 'Cà Mau',
                    'type' => 'Tỉnh',
                    'delivery_fee_id' => 3,
                ),
        ));
    }
}
