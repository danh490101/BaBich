<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->delete();

        DB::table('brands')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'Laroche Posay',
                    'image' => asset('asset/images/bn3.jpg')
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'Cocoon',
                    'image' => asset('asset/images/bn2.jpg'),
                ),
            2 =>
            array(
                'id' => 3,
                'name' => 'SVR',
                'image' => asset('asset/images/chao-mung-mint-cosmetics-tro-thanh-dai-ly-phan-phoi-chinh-hang-cua-svr.jpg')
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Martiderm',
                'image' => asset('asset/images/109491710_3456480031029831_3387049435560837690_n_16bb7b8b76524608991f125c3272ead3.JPG'),
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Bioderma',
                'image' => asset('asset/images/bioderma_no_text_1200x1200.JPG'),
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Cerave',
                'image' => asset('asset/images/top-6-sua-rua-mat-cerave-cho-da-dau-mun-to-t-nha-t-2023-28062023132953.jpg'),
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Dr.G',
                'image' => asset('asset/images/U4ca32f69e0c54e8da4bb947104a4ba13O.JPG'),
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Eucerin',
                'image' => asset('asset/images/my-pham-eucerin-2.jpg'),
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Vasaline',
                'image' => asset('asset/images/vaseline.jpg'),
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Nivea',
                'image' => asset('asset/images/Body.jpg'),
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'Vichy',
                'image' => asset('asset/images/5f65b2cf1bf36d1bbf2a2f543aef75b1.jpg'),
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'Image',
                'image' => asset('asset/images/about.jpg'),
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'Simple',
                'image' => asset('asset/images/my-pham-simple-co-tot-khong-14.jpg'),
            ),13 =>
            array(
                'id' => 14,
                'name' => 'Some By Mi',
                'image' => asset('asset/images/some-by-mi-1.jpg'),
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Skin 1004',
                'image' => asset('asset/images/share_fb_home.JPG'),
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'Klairs',
                'image' => asset('asset/images/f920791e-c85b-46f4-8dbb-453d7ccb7bc0-.jpg'),
            ),
            16 =>
            array(
                'id' => 17,
                'name' => "Kiehl's",
                'image' => asset('asset/images/Studio_Project-2_1618999776.jpG'),
            ),
            17 =>
            array(
                'id' => 18,
                'name' => "DrCeutics",
                'image' => asset('asset/images/bn5.jpg'),
            ),
            18 =>
            array(
                'id' => 19,
                'name' => "Innisfree",
                'image' => asset('asset/images/bn6.jpg'),
            ),
        ));
    }
}
