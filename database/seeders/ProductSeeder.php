<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->delete();
        DB::table('products')->insert([
            0 =>
            array(
                'id' => 1,
                'name' => 'Sữa Chống Nắng Anessa Dưỡng Da Kiềm Dầu 60ml',
                // 'category_id' => 123,
                // 'brand_id' => 16,
                // 'Skin_id' => 123,
                'desc' => 'Sữa Chống Nắng Anessa Dưỡng Da Kiềm Dầu Bảo Vệ Hoàn Hảo là sản phẩm chống nắng đến từ thương hiệu chống nắng dưỡng da ANESSA hàng đầu Nhật Bản suốt 21 năm liên tiếp, giúp chống lại tác hại của tia UV & bụi mịn tối ưu dưới mọi điều kiện sinh hoạt, kể cả thời tiết khắc nghiệt nhất. Sản phẩm đặc biệt phù hợp với làn da thiên dầu.
                    Anessa Perfect UV Sunscreen Skincare Milk N SPF50+ PA++++ ứng dụng công nghệ Auto Booster và Very Water Resistant độc quyền từ thương hiệu ANESSA, giúp cho lớp màng chống UV trở nên bền vững hơn khi gặp NHIỆT ĐỘ CAO - ĐỘ ẨM - MỒ HÔI - NƯỚC - MA SÁT, đồng thời chống trôi trong nước lên đến 80 phút, chống bụi mịn PM.25 và chống dính cát. Ngoài ra, sự bổ sung của phức hợp 50% thành phần dưỡng da giúp ngăn ngừa lão hoá do tia UV hiệu quả và nuôi dưỡng da ẩm mịn.
                    Sữa Chống Nắng Anessa Perfect UV Sunscreen Skincare Milk N SPF50+ PA++++ 60ml hiện đã có mặt tại BaBich.',
                'image' => asset('asset/images/pd2-1.jpg'),
                'images' => asset('asset/images/pd2-2.jpg'),
                'image2' => asset('asset/images/pd2-3.jpg'),
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Kem Chống Nắng Cocoon Bí Đao Quang Phổ Rộng 50ml',
                // 'category_id' => 123,
                // 'brand_id' => 2,
                // 'skin_id' => 791,
                'desc' => 'em Chống Nắng Cocoon Bí Đao Quang Phổ Rộng 50ml là sản phẩm chống nắng da mặt đến từ thương hiệu mỹ phẩm Cocoon của Việt Nam, với công thức đột phá kết hợp các màng lọc thế hệ mới, chiết xuất bí đao và các thành phần chống oxi hoá, kem chống nắng bí đao mang lại khả năng bảo vệ phổ rộng chống lại bức xạ UVA và UVB là nguyên nhân gây ra tác hại lên da như bỏng rát, cháy nắng, kích ứng, lão hoá và tổn thương tế bào da. Cocoon Winter Melon Suncreen với khả năng bảo vệ rất cao SPF 50+, PA ++++ và hỗ trợ làm giảm độ bóng nhờn trên da hiệu quả.
                    Loại da phù hợp: 
Da dầu mụn

Phụ nữ mang thai có thể sử dụng.

Giải pháp cho tình trạng da:
Da dầu thừa, lỗ chân lông to.

Da nhạy cảm, kích ứng. 

Muốn sử dụng kem chống nắng có độ bảo vệ và hiệu quả cao. 

Ưu thế nổi bật: 
Không gây cay mắt, kháng nước.

Tạo lớp nền hoàn thiện đẹp, không bị cakey, tông da sáng rất nhẹ ở 3 phút đầu sau khi thoa, sau đó tệp dần vào da mang lại lớp hoàn thiện tự nhiên.

Dễ tán vào da, không bị vón, không tạo rãnh trắng mất thẩm mỹ, không bị bóng nhẫy sau 8 tiếng sử dụng.

Chiết xuất và hoạt chất chống oxi hoá:

Chiết xuất bí đao có tác dụng giảm viêm, kháng khuẩn, làm dịu, giúp giảm mụn viêm.

Vitamin B3 (Niacinamide) tăng cường hàng rào bảo vệ da ngăn lại các tác động xấu từ môi trường như ô nhiễm, khói bụi, góp phần tổng hợp ceramide của lớp sừng và hyaluronic acid tự nhiên.

Vitamin E (Tocopherol) là một chất chống oxi hoá mạnh được chiết xuất hoàn toàn từ đậu nành không biến đổi gen (Non-GMO).

Hydroxymethoxyphenyl Decanone là một chất chống oxi hoá bảo vệ tế bào, giảm tình trạng kích ứng, bảo vệ da khỏi những tổn thương. 

Tetrahexyldecyl Ascorbate là một dẫn xuất vitamin C chống oxi hoá mạnh, bảo vệ tế bào trước bức xạ UV và ngăn ngừa sự hình thành sắc tố do UV gây ra.

Màng lọc tiên tiến chống bức xạ UVA, UVB hiệu quả cao:
Tinosorb A2B (Tris-Biphenyl Triazine) là màng lọc thế hệ mới bảo vệ hiệu quả nhất trong quãng UVB/UVA2 với đỉnh hấp thụ là 310nm, đồng thời giúp tăng cường cho quãng UVA1.

Tinosorb S (Bis-Ethylhexyloxyphenol Methoxyphenyl Triazine) màng lọc phổ rộng thế hệ mới với phổ bảo vệ rất dài bao phủ từ UVB, UVA2 cho đến UVA1 với 2 đỉnh chống UV 310nm và 345nm. 

Uvinul T150 (Ethylhexyl Triazone) màng lọc thế hệ mới mang lại khả năng hấp thụ ổn định UVB cao nhất trong số tất cả các bộ lọc UVB trên thị trường hiện nay.

Uvinul A Plus (Diethylamino Hydroxybenzoyl Hexyl Benzoate) là màng lọc thế hệ mới chống UVA2/UVA1 rất mạnh với đỉnh bảo vệ lên đến 354nm, cùng khả năng bảo vệ tuyệt vời ngăn lại các gốc tự do.

Parsol 1789 (Avobenzone - Butyl Methoxydibenzoylmethane) được xem là màng lọc chống UVA mạnh nhất hiện nay và cũng là màng lọc duy nhất được thông qua trên toàn cầu với quãng hấp thụ rộng và đỉnh hấp thụ rất cao 357 nm.',
                'image' => asset('asset/images/pd1-1.jpg'),
                'images' => asset('asset/images/pd2-2.jpg'),
                'image2' => asset('asset/images/pd2-3.jpg'),

            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Tẩy Tế Bào Chết Da Mặt Cocoon Cà Phê Đắk Lắk 150ml',
                // 'category_id' => 341,
                // 'brand_id' => 2,
                // 'skin_id' => 791,
                'desc' => 'Cà Phê Đắk Lắk làm sạch da chết mặt Dak Lak coffee face polish 150ml là dòng sản phẩm tẩy tế bào chết da mặt đến từ thương hiệu mỹ phẩm Cocoon Việt Nam. Thành phần được làm từ những hạt cà phê Đắk Lắk xay nhuyễn giàu cafeine hòa quyện với bơ cacao Tiền Giang giúp bạn loại bỏ lớp tế bào chết già cỗi và xỉn màu, đánh thức làn da tươi mới đầy năng lượng cùng cảm giác mượt mà và mềm mịn lan tỏa.
                Với lợi thế Việt Nam là đất nước đứng thứ hai trên thế giới về xuất khẩu cà phê, thương hiệu Cocoon đã tận dụng nguồn nguyên liệu đặc hữu này để tạo ra sản phẩm làm sạch da chết từ hạt cà phê. Cocoon Dak Lak coffee face polish sử dụng hạt scrub từ cà phê được xay nhuyễn và sàng lọc theo tỉ lệ phù hợp, hoàn toàn không chứa hạt vi nhựa. Sản phẩm đảm bảo dễ dàng cuốn trôi những lớp da chết già cỗi nhưng không làm tổn thương đến làn da của bạn.

Bên cạnh đó, caffeine và các chất chống oxy hóa có trong hạt cà phê sẽ nhanh chóng cải thiện làn da xỉn màu, giúp da trở nên săn chắc, mềm mượt, tràn đầy năng lượng tươi mới ngay sau lần sử dụng đầu tiên
Loại da phù hợp:
Sản phẩm phù hợp với mọi loại da. 

Giải pháp cho tình trạng da:
Da xỉn màu & thâm sạm. 

Da có nhiều tế bào chết cần được làm sạch để trở nên mềm mại, sáng mịn.

Công dụng:
Làm sạch da chết trên mặt.

Mang lại làn da mịn màng ngay sau lần đầu sử dụng.

Giúp da sáng mịn, đều màu.

Độ an toàn:
Không chứa cồn, không sulfate, không dầu khoáng, không paraben, không vi hạt nhựa, không thử nghiệm trên động vật

Bảo quản:
Nơi khô ráo thoáng mát. 

Tránh ánh nắng trực tiếp, nơi có nhiệt độ cao hoặc ẩm ướt. 

Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/google-shopping-ca-phe-dak-lak-lam-sach-da-chet-cho-mat-cocoon-150ml-1689922550_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/ca-phe-dak-lak-lam-sach-da-chet-cho-mat-cocoon-150ml-2_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/ca-phe-dak-lak-lam-sach-da-chet-cho-mat-cocoon-150ml-3_img_358x358_843626_fit_center.jpg'),
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Tẩy Tế Bào Chết Toàn Thân Cocoon Cà Phê Đắk Lắk 200ml',
                // 'category_id' => 341,
                // 'brand_id' => 2,
                // 'skin_id' => 791,
                'desc' => 'Tẩy Da Chết Toàn Thân Cocoon Cà Phê Đắk Lắk là dòng tẩy tế bào chết toàn thân từ thương hiệu mỹ phẩm Cocoon của Việt Nam là một trong những sản phẩm với thành phần tự nhiên có nguồn gốc trong nước như hạt cà phê Đắk Lắk nguyên chất xay nhuyễn, hòa quyện cùng bơ cacao Tiền Giang giúp loại bỏ tế bào chết hiệu quả, làm đều màu da, mang lại năng lượng, giúp da trở nên mềm mại và rạng rỡ giúp mang đến cho bạn sản phẩm thuần chay tốt nhất với niềm tự hào từ nguyên liệu thuần Việt.
                Ưu thế nổi bật:
Cà phê giúp da trở nên săn chắc đều màu, mang lại nguồn năng lượng cho làn da luôn mềm mại và rạng rỡ.

Bơ ca cao có khả năng giữ ẩm tuyệt vời, giúp khóa độ ẩm cho làn da, làm mềm da khô, ngăn ngừa hình thành vết rạn và nếp nhăn trên da.

Da dần trở nên sáng mịn, đều màu hơn, đồng thời tăng cường lưu thông máu huyết dưới da và hỗ trợ giảm tình trạng da sần vỏ cam, viêm nang lông, dày sừng nang lông.

Sản phẩm có hương thơm ngọt ngào quyến rũ như tách Mocha thơm lừng hương cà phê pha chút béo béo của cacao.

Độ an toàn:
Cocoon cam kết sản phẩm 100% thuần thực vật.

Không chứa thành phần động vật và không thử nghiệm trên động vật. 

Không chứa vi hạt nhựa gây tắc nghẽn cống, ô nhiễm môi trường. 

Bảo quản:
Nơi khô ráo thoáng mát.

Tránh ánh nắng trực tiếp, nơi có nhiệt độ cao hoặc ẩm ướt.

Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/google-shopping-ca-phe-dak-lak-tay-da-chet-toan-than-cocoon-200ml-1686802939_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/ca-phe-dak-lak-tay-da-chet-toan-than-cocoon-200ml-1-1696313585_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/ca-phe-dak-lak-tay-da-chet-toan-than-cocoon-200ml-2-1696313586_img_358x358_843626_fit_center.jpg'),
            ),
            4 =>
            array(
                'id' => 5,
                'name' => 'Kem Chống Nắng La Roche-Posay Kiểm Soát Dầu SPF50+ 50ml',
                // 'category_id' => 123,
                // 'brand_id' => 3,
                // 'skin_id' => 123,
                'desc' => 'Kem chống nắng giúp bảo vệ da khỏi tia UVB & UVA dài và giảm bóng nhờn La Roche-Posay Anthelios UV Mune 400 Oil Control Gel-Cream 50ml là kem chống nắng dành cho da dầu phiên bản công thức cải tiến mới đến từ thương hiệu dược mỹ phẩm La Roche-Posay, giúp kiểm soát bóng nhờn và bảo vệ da trước tác hại từ ánh nắng & ô nhiễm, ngăn chặn các tác nhân gây lão hóa sớm. Sản phẩm có công thức chống thấm nước thích hợp dùng hằng ngày và cả những hoạt động ngoài trời.

                Tia UVA dài được mệnh danh là kẻ thù nguy hiểm nhất với làn da, bởi bước sóng lên đến 380nm-400nm, làm tổn thương những tế bào sâu dưới da. Với cường độ mạnh vào mùa hè, tia UVA dài sẽ gây ra những tác hại lâu dài như thâm nám, lão hóa da.
                
                Thấu hiệu được nhu cầu tìm kiếm sản phẩm chống nắng có khả năng bảo vệ da trước tác hại của tia UVA dài, thương hiệu La Roche-Posay đã cho ra đời phiên bản UVMune 400 Oil Control Gel Cream - kem chống nắng có màng lọc tiên tiến nhất thị trường Mexoryl 400. Kết hợp cùng công nghệ Netlock tạo nên lớp lá chắn bền vững giúp bảo vệ da khỏi tia UVA dài nguy hiểm gây thâm nám.
                
                Bên cạnh đó, kem chống nắng La Roche-Posay UVMune 400 Oil Control Gel Cream phiên bản mới được cải tiến với nồng độ phần trăm hoạt chất Airlicium được tăng lên, mang đến hiệu quả kiềm dầu tốt hơn đến 12h. Ngoài ra, sản phẩm còn có kết cấu mới dễ tán, thấm nhanh không gây vón, mang lại cho bạn một lớp finish mịn lì và bóng khỏe tự nhiên.
                
Loại da phù hợp:
Sản phẩm phù hợp cho da dầu và da hỗn hợp.

Thích hợp sử dụng cho da mặt và cổ.

Giải pháp cho tình trạng da:
Da dầu thừa - lỗ chân lông to.

Da mụn hoặc dễ nổi mụn do bít tắc lỗ chân lông.

Ưu điểm nổi bật:
Kết cấu dạng kem gel, thẩm thấu tức thì, mang lại cảm giác khô thoáng, không để lại vệt trắng.

Kiểm soát bã nhờn & mồ hôi vượt trội nhờ hoạt chất AIRLICIUM, giúp mang đến một cảm giác “sạch” cho làn da đến 12h.

Bảo vệ da trước những tác hại từ ánh nắng & ô nhiễm: lão hóa sớm, đốm nâu, kích ứng ánh nắng.

Độ chống nắng cao nhất SPF 50+ bảo vệ da tối ưu dưới ánh nắng.

Chống nắng phổ rộng với màng lọc độc quyền MEXORYL 400 - màng lọc UV duy nhất trên thị trường và hiệu quả nhất, kể cả trước những tia UVA dài làm hủy hoại tế bào da với bước sóng 380-400nm. Ngăn chặn hiểu quả của thâm nám da.

Hiệu quả sử dụng:
Giảm 25% bóng dầu chỉ sau 1 tuần.

> 83% tạo hiệu ứng lì 12h trên da.

> 97% không gây nhờn rít, bết dính sau 12h sử dụng.

> 98% không để lại vệt trắng trên da.

Độ an toàn:
Được kiểm nghiệm dưới sự giám sát của các chuyên gia da liễu.

Không chứa hương liệu, không paraben, không gây bết dính, không để lại vệt trắng, lâu trôi khi sử dụng dưới nước và không gây mụn trứng cá.

Tuyệt đối an toàn với da, đặc biệt là da nhạy cảm.

Bảo quản:
Tránh ánh nắng trực tiếp.

Để nơi khô ráo, thoáng mát.

Đậy nắp kín sau khi sử dụng.
                ',
                'image' => asset('asset/images/google-shopping-kem-chong-nang-la-roche-posay-kiem-soat-dau-spf50-50ml-phien-ban-moi-1691994786_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/kem-chong-nang-la-roche-posay-kiem-soat-dau-spf50-50ml-5_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/kem-chong-nang-la-roche-posay-kiem-soat-dau-spf50-50ml-ban-tieng-duc-va-tieng-y-1687336207_img_358x358_843626_fit_center.jpg'),
            ),
            5 =>
            array(
                'id' => 6,
                'name' => 'Kem Dưỡng La Roche-Posay Giúp Phục Hồi Da Đa Công Dụng 40m',
                // 'category_id' => 338,
                // 'brand_id' => 3,
                // 'skin_id' => 234,
                'desc' => 'Kem dưỡng Cicaplast Baume B5+ Ultra-Repairing Soothing Balm mới từ thương hiệu dược mỹ phẩm La Roche-Posay được thiết kế chuyên biệt dành cho làn da khô, kích ứng và thương tổn, giúp phục hồi da sau 1H và bảo vệ hàng rào độ ẩm da với công nghệ cải tiến mới Tribioma và các hoạt chất phục hồi chuyên sâu.
                Loại da phù hợp:
Sản phẩm phù hợp cho da khô.

Giải pháp cho tình trạng da:
Trẻ sơ sinh, trẻ nhỏ và người lớn ở mọi độ tuổi.

Da bị kích ứng do sử dụng các sản phẩm treatment (Retinol, BHA, AHA,...).

Da sau nặn mụn.

Da sau thẩm mỹ xâm lấn (Peel da, laser,…).

Da bị khô, bong tróc, nứt nẻ, mẩn đỏ, ngứa.

Da bé bị hăm tã.

Ưu thế nổi bật:
Giúp phục hồi da sau 1H.

Bảo vệ hàng rào độ ẩm da.

Cân bằng hệ vi sinh vật trên da giúp quá trình làm lành & phục hồi tốt hơn, nhanh hơn.

Làm dịu da tức thì.

Phục hồi da sau nặn mụn, da sử dụng retinol & da bé bị hăm tã.

Hiệu quả sử dụng:
NGAY LẬP TỨC sau khi sử dụng:

84% người sử dụng thấy da được làm dịu.

82% người sử dụng thấy da được bảo vệ.

4 TUẦN sau khi sử dụng:

88% người sử dụng thấy da được tái tạo.

90% người sử dụng thấy da ít thương tổn hơn.

Bảo quản:
Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp hoặc nơi có nhiệt độ cao / ẩm ướt.

Tránh xa tầm tay trẻ em.

Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/bo-san-pham-la-roche-posay-phuc-hoi-da-cong-dung-va-diu-da-2-mon-1-1679884342_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/bo-san-pham-la-roche-posay-phuc-hoi-da-cong-dung-va-diu-da-2-mon-2-1679884342_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/bo-san-pham-la-roche-posay-phuc-hoi-da-cong-dung-va-diu-da-2-mon-4-1679884341_img_358x358_843626_fit_center.jpg'),
            ),
            6 =>
            array(
                'id' => 7,
                'name' => 'Nước Tẩy Trang La Roche-Posay Dành Cho Da Nhạy Cảm 400ml',
                // 'category_id' => 321,
                // 'brand_id' => 3,
                // 'skin_id' => 789,
                'desc' => 'Nước Tẩy Trang La Roche-Posay Micellar Water Ultra Sensitive Skin đến từ thương hiệu dược mỹ phẩm La Roche-Posay của Pháp là dòng sản phẩm tẩy trang dành cho da mặt, vùng mắt và môi, ứng dụng công nghệ Glyco Micellar giúp làm sạch sâu lớp trang điểm và bụi bẩn, bã nhờn trên da vượt trội mà vẫn êm dịu, không gây căng rát hay kích ứng da; đồng thời cung cấp độ ẩm, mang đến làn da mềm mại & thoáng nhẹ sau khi sử dụng.
                Loại da phù hợp:
Sản phẩm phù hợp cho da thường và da nhạy cảm.

Phù hợp để tẩy trang cho vùng mặt, mắt và môi.

Giải pháp cho tình trạng da:
Da nhạy cảm - kích ứng

Da thiếu nước - thiếu ẩm

Công dụng:
Công nghệ đột phá Glyco Micellar mang lại hiệu quả làm sạch sâu vượt trội giúp lấy đi bụi bẩn, bã nhờn và lớp trang điểm nhưng vẫn an toàn cho làn da nhạy cảm.

Làm sạch đến 99% lớp trang điểm, 70% mascara và các hạt bụi siêu nhỏ có trong khói xe và môi trường ô nhiễm chỉ sau một lượt bông cotton*.

Chứa nước khoáng La Roche-Posay có nồng độ Selenium tự nhiên cao, với đặc tính làm dịu da, giảm kích ứng và chống oxi hóa, giúp bảo vệ da trước môi trường ô nhiễm.

Cung cấp độ ẩm với Glycerin, giảm thiểu ma sát gây tổn thương da trong quá trình làm sạch.

Mang lại làn da sạch mịn màng, thoáng nhẹ sau khi sử dụng.Độ an toàn:
Không paraben / Không chất tạo màu / Không cồn / Không chứa xà phòng.

Duy trì độ pH tự nhiên của da nên an toàn với mọi loại da, kể cả da nhạy cảm.Bảo quản:
Tránh ánh nắng trực tiếp.

Để nơi khô ráo, thoáng mát.

Đậy nắp kín sau khi sử dụng.
Thông số sản phẩm:
Dung tích: 400ml

Xuất xứ thương hiệu: Pháp

Nơi sản xuất: Pháp

Hạn sử dụng: 3 năm kể từ ngày sản xuất

Ngày sản xuất: Xem trên bao bì sản phẩm',
                'image' => asset('asset/images/facebook-dynamic-nuoc-tay-trang-la-roche-posay-danh-cho-da-nhay-cam-400ml-1663660676_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/nuoc-tay-trang-la-roche-posay-danh-cho-da-nhay-cam-400ml-1663660676_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/nuoc-tay-trang-la-roche-posay-danh-cho-da-nhay-cam-400ml-2-1663660675_img_358x358_843626_fit_center.jpg'),
            ),
            7 =>
            array(
                'id' => 8,
                'name' => 'Gel Rửa Mặt La Roche-Posay Dành Cho Da Dầu, Nhạy Cảm 200ml',
                // 'category_id' => 112,
                // 'brand_id' => 3,
                // 'skin_id' => 123,
                'desc' => 'Gel Rửa Mặt La Roche-Posay Effaclar Purifying Foaming Gel For Oily Sensitive Skin là dòng sản phẩm sữa rửa mặt chuyên biệt dành cho làn da dầu, mụn, nhạy cảm đến từ thương hiệu dược mỹ phẩm La Roche-Posay nổi tiếng của Pháp, với kết cấu dạng gel tạo bọt nhẹ nhàng giúp loại bỏ bụi bẩn, tạp chất và bã nhờn dư thừa trên da hiệu quả, mang đến làn da sạch mịn, thoáng nhẹ và tươi mát. Công thức sản phẩm an toàn, lành tính, giảm thiểu tình trạng kích ứng đối với làn da nhạy cảm.
                Giải pháp cho tình trạng da:
Dầu thừa - lỗ chân lông to

Da mụn cám, đầu đen, đầu trắng và sưng viêm từ trung bình đến nặng vừa

Da nhạy cảm, dễ kích ứng

Ưu thế nổi bật:
 La Roche-Posay Effaclar Purifying Foaming Gel For Oily Sensitive Skin có công thức được lựa chọn kĩ càng với các thành phần hoạt tính dịu nhẹ, phù hợp cho làn da dầu, mụn & nhạy cảm:

Nước khoáng thiên nhiên La Roche-Posay có tác dụng làm dịu da và giảm kích ứng.

ZinC PCA giúp điều tiết lượng dầu tiết ra trên da, từ đó kiểm soát bóng dầu và bã nhờn dư thừa hiệu quả, giảm hình thành mụn đầu đen.

Độ pH 5.5 giống với độ pH tự nhiên trên da, giúp củng cố hàng rào bảo vệ da, không gây cảm giác khô căng, khó chịu.

Kết cấu sản phẩm dạng gel tạo bọt, nhẹ nhàng loại bỏ những tạp chất, bụi bẩn và ô nhiễm trên da, mang đến cảm giác tươi mát đầy sảng khoái sau khi rửa mặt.

Hương thơm hoa cúc dịu nhẹ sẽ giúp bạn thư giãn trong suốt quá trình sử dụng.
Độ an toàn:
Không chứa Paraben, chất tạo màu, xà phòng, cồn, an toàn cho làn da nhạy cảm.

Công thức không chứa dầu (oil-free) nên rất thích hợp cho da dầu.

Bảo quản:
Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp hoặc nơi có nhiệt độ cao / ẩm ướt.

Tránh xa tầm tay trẻ em.

Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/facebook-dynamic-gel-rua-mat-tao-bot-la-roche-posay-danh-cho-da-dau-nhay-cam-200ml-1693988261_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/gel-rua-mat-la-roche-posay-danh-cho-da-dau-nhay-cam-200ml-1-1663663649_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/gel-rua-mat-la-roche-posay-danh-cho-da-dau-nhay-cam-200ml-3-1663663649_img_358x358_843626_fit_center.jpg'),
            ),
            8 =>
            array(
                'id' => 9,
                'name' => 'Gel Rửa Mặt SVR Không Chứa Xà Phòng Cho Da Dầu 400ml',
                // 'category_id' => 112,
                // 'brand_id' => 15,
                // 'skin_id' => 123,
                'desc' => 'Gel Rửa Mặt SVR Sebiaclear Gel Moussant là sản phẩm sữa rửa mặt dành cho làn da dầu mụn đến từ thương hiệu dược mỹ phẩm SVR của Pháp, với công thức không chứa xà phòng giúp làm sạch, nhẹ nhàng làm thông thoáng làn da. Khả năng tạo bọt mịn giúp loại trừ các chất bẩn và lượng bã nhờn dư thừa mà không làm khô da. Có thể rửa sạch dễ dàng, mang lại một làn da sạch, tươi mát và khô thoáng.
                Loại da phù hợp:
Sản phẩm phù hợp với da hỗn hợp đến da dầu, da mụn nhạy cảm.
Giải pháp cho tình trạng da:
Da dầu thừa - lỗ chân lông to.
Da mụn trứng cá, mụn đầu đen, mụn ẩn do bít tắc lỗ chân lông.

Ưu thế nổi bật:
Gluconolactone với tác động giảm viêm và tiêu sừng, giúp làm sạch da và thông thoáng lỗ chân lông. Hiệu quả tương tự như AHAs với độ dung nạp tốt hơn.

Niacinamide có tác dụng giảm khuẩn và điều tiết bã nhờn.

Các tác nhân làm sạch dịu nhẹ giúp làm sạch hiệu quả trong khi vẫn giữ vững sự cân bằng cho làn da nhạy cảm.

Mat SR (2%) giúp điều hòa lượng bã nhờn dư thừa, cho làn da không bóng dầu.

Dạng gel không chứa xà phòng, tạo bọt mịn, giúp làm sạch da hiệu quả nhưng không gây khô căng, dễ dàng rửa sạch mà không nhờn rít.
Hiệu quả đã được chứng minh:
Da được làm sạch: 100% 

Loại bỏ lượng bã nhờn dư thừa: 100% 

Giảm tắc nghẽn lỗ chân lông: 100% 

Da mềm mại: 100% 

Độ an toàn:
Không chứa xà phòng- Không chứa cồn- Không chứa chất tạo màu- Không chứa paraben- Không gây dị ứng.',
                'image' => asset('asset/images/google-shopping-gel-rua-mat-svr-khong-chua-xa-phong-cho-da-dau-400ml-1-1649227732_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/gel-rua-mat-svr-khong-chua-xa-phong-cho-da-dau-400ml-1-1696654299_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/gel-rua-mat-svr-khong-chua-xa-phong-cho-da-dau-400ml-doi-mau-1649227920_img_358x358_843626_fit_center.jpg'),
            ),
            9 =>
            array(
                'id' => 10,
                'name' => 'Serum SVR Làm Giảm Mụn, Mờ Nám, Làm Mềm Mịn Da 30ml',
                // 'category_id' => 337,
                // 'brand_id' => 15,
                // 'skin_id' => 123,
                'desc' => 'Tinh Chất Làm Giảm Mụn, Mờ Nám, Làm Mềm Mịn Da SVR Sebiaclear Serum là dòng sản phẩm chăm sóc da hằng ngày mới ra mắt từ thương hiệu dược mỹ phẩm SVR (Pháp), được thiết kế dành cho làn da người trưởng thành dễ bị mụn trứng cá, giúp mang lại đa tác dụng cho da bao gồm: làm giảm các đốm mụn sưng viêm, mụn đầu đen; hỗ trợ se khít lỗ chân lông và giảm vết thâm rõ rệt; đồng thời giữ ẩm và làm mịn da.
                Công thức SVR Sebiaclear Serum chứa nồng độ cao các hoạt chất da liễu tiên tiến giúp mang lại hiệu quả gấp ba: làm giảm mụn và khuyết điểm trên da, làm mờ vết thâm và nếp nhăn. SVR Sebiaclear Serum là sự kết hợp độc đáo giữa các phức hợp dưỡng da bao gồm:

Phức hợp làm giảm mụn mạnh mẽ: 14% GLUCONOLACTONE + 4% NIACINAMIDE = SEBIACLEAR.Phức hợp các hoạt chất ngăn ngừa lão hóa: RETINOID-LIKE + HYALURONIC ACID = Hợp chất cho độ dung nạp cao giúp ngăn ngừa hình thành các dấu hiệu lão hóa da: giữ ẩm, làm đầy đặn và làm mịn da.

14% Gluconolactone là một hoạt chất có nguồn gốc tự nhiên, mang lại hiệu quả tương tự như AHA nhưng độ dung nạp tốt hơn rất nhiều và ít gây kích ứng da. Gluconolactone có khả năng tinh chỉnh kết cấu da, làm thông thoáng lỗ chân lông và hạn chế sự hình thành các khuyết điểm như đốm mụn, mụn đầu đen, đốm nâu sậm màu trên da, đồng thời cải thiện tông màu da trở nên đồng đều & rạng rỡ.

4% Niacinamide kháng viêm, giúp làm dịu đi các kích ứng, hạn chế sự tăng sinh vi khuẩn trên da. Niacinamide cũng giúp làm sáng da, mờ thâm mụn.

Lá chắn chống ô nhiễm: ANTI-OXIDANT VEGETAL + ANTI-POLLUTION SUGAR = Bảo vệ da chống lại sự xâm lược từ bên ngoài, ngăn ngừa hiện tượng stress oxy hóa.
Với SVR Sebiaclear Serum, bạn có thể nhận thấy sự biến chuyển rõ rệt của làn da chỉ từ 7 ngày sử dụng trở đi: các vết mụn và thâm mụn mờ dần đi, da mịn màng hơn, căng hơn và được bảo vệ chống lại sự tác động từ bên ngoài.

Kết cấu sản phẩm dạng sữa lỏng siêu nhẹ và tươi mát, sau khi thoa lên da sẽ “tan chảy” và thẩm thấu nhanh chóng, cho hiệu quả dưỡng ẩm lên đến 8 giờ sau khi sử dụng. Đặc biệt, lớp finish mịn lì của SVR Sebiaclear Serum rất thích hợp để làm lớp lót trước makeup, giúp mang lại lớp nền mịn màng hoàn hảo.
Loại da phù hợp:
Sản phẩm phù hợp với da dầu/hỗn hợp dầu, da nhạy cảm, da người lớn bị mụn.

Công dụng chính:
Làm dịu da, giảm kích ứng.

Cải thiện tình trạng mụn trên da: mụn sưng đỏ, mụn đầu đen…

Giảm các đốm nâu, thâm mụn, dưỡng sáng và làm đồng đều sắc da.

Hỗ trợ thu nhỏ kích thước lỗ chân lông.

Dưỡng ẩm cho da trong suốt 8 giờ.

Tinh chỉnh kết cấu da trở nên mịn màng hơn.

Độ an toàn:
Không chứa cồn, Paraben, dầu khoáng, chất tạo màu.

Hiệu quả đã được chứng minh dưới sự kiểm soát của bác sĩ da liễu.

Không gây dị ứng, không gây mụn.

Bảo quản:
Nơi khô ráo, thoáng mát.

Tránh ánh nắng trực tiếp, nơi có nhiệt độ cao hoặc ẩm ướt.

Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/PD5.jpg'),
                'images' => asset('asset/images/tinh-chat-svr-lam-giam-mun-mo-nam-lam-mem-min-da-30ml-1-1672391745_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/tinh-chat-svr-lam-giam-mun-mo-nam-lam-mem-min-da-30ml-1672391745-1696655014_img_358x358_843626_fit_center.jpg'),
            ),
            10 =>
            array(
                'id' => 11,
                'name' => 'Gel Dưỡng SVR Giảm Mụn & Loại Bỏ Dầu Cho Da 40ml',
                // 'category_id' => 338,
                // 'brand_id' => 15,
                // 'skin_id' => 123,
                'desc' => 'Kem Dưỡng SVR SLàm Giảm Mụn & Giúp Loại Bỏ Dầu Cho Da 40ml là sản phẩm kem dưỡng chăm sóc da chuyên sâu của thương hiệu dược mỹ phẩm SVR, được điều chế để xử lý các vấn đề về da dầu và mụn. Công thức chứa các hoạt chất da liễu có nống độ cao nhằm mang lại hiệu quả rõ rệt với các khuyết điểm sau 7 ngày. Các đốm mụn và mụn đầu đen được giảm đáng kể, chất lượng da được cải thiện, giảm bóng nhờn và các vết đỏ/nâu được khắc phục.
                Loại da phù hợp:
Sản phẩm phù hợp cho da dầu, da mụn nhạy cảm.
Giải pháp cho tình trạng da:
Da mụn: mụn mủ, mụn đầu đen, mụn đầu trắng.

Da có vết thâm do mụn để lại.

Da dầu thừa nhiều, bóng nhờn, dễ bít tắc lỗ chân lông.
Ưu thế nổi bật:
SVR Sebiaclear Active chứa các hoạt chất da liễu có nống độ cao cho hiệu quả rõ rệt sau 7 ngày:

14% Gluconolactone: là một acid polyhydroxy (PHA) có hiệu quả trong việc điều chỉnh kết cấu da như AHA nhưng được dung nạp tốt hơn. Làm thông thoáng lỗ chân lông bị tắc và giảm sự xuất hiện của các khuyết điểm.

4% Niacinamide (thuộc nhóm vitamin B3): làm giảm kích ứng ở vùng da bị mụn, đồng thời loại bỏ các khuyết điểm liên quan đến viêm nhiễm và ngăn ngừa sự xuất hiện tình trạng tăng sắc tố sau viêm (dẫn đến thâm).

Dành cho da mụn nhạy cảm, da có nhiều khuyết điểm.

Kết cấu dạng gel-cream cực kỳ thoải mái giúp hydrat hóa làn da và làm dịu cảm giác khó chịu mà không để lại lớp bóng nhờn hay vệt trắng, không gây vón và thẩm thấu nhanh.

Không gây dị ứng - không gây mụn. Hiệu quả đã được chứng minh dưới sự kiểm soát da liễu.
Hiệu quả chứng minh:
Đã thử nghiệm trên da dễ bị mụn trứng cá nhạy cảm:

Giảm 33% vết thâm *

90% tình nguyện viên nói rằng nó làm dịu làn da của họ **

87% tình nguyện viên cho biết nó làm ẩm da của họ **

* Chấm điểm lâm sàng sau 28 ngày, 31 tình nguyện viên, áp dụng 2 lần/ngày.

** Thử nghiệm sử dụng ở 28 ngày, 31 tình nguyện viên, áp dụng 2 lần/ngày, % hài lòng.

Bảo quản:
Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp hoặc nơi có nhiệt độ cao / ẩm ướt.',
                'image' => asset('asset/images/google-shopping-gel-duong-svr-giam-mun-loai-bo-dau-cho-da-40ml-moi-1666323062_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/gel-duong-svr-giam-mun-loai-bo-dau-cho-da-40ml-moi-1-1672389054_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/gel-duong-svr-giam-mun-loai-bo-dau-cho-da-40ml-moi-1-1696651739_img_358x358_843626_fit_center.jpg'),
            ),
            11 =>
            array(
                'id' => 12,
                'name' => 'Sữa Rửa Mặt CeraVe Sạch Sâu Cho Da Thường 88ml',
                // 'category_id' => 112,
                // 'brand_id' => 7,
                // 'skin_id' => 791,
                'desc' => 'Sữa Rửa Mặt Cerave Sạch Sâu là sản phẩm sữa rửa mặt đến từ thương hiệu mỹ phẩm Cerave của Mỹ, với sự kết hợp của ba Ceramides thiết yếu, Hyaluronic Acid sản phẩm giúp làm sạch và giữ ẩm cho làn da mà không ảnh hưởng đến hàng rào bảo vệ da mặt và cơ thể.
                Sữa Rửa Mặt Cerave Foaming Cleanser kết cấu dạng gel tạo bọt rất lý tưởng để loại bỏ dầu thừa, bụi bẩn và lớp trang điểm với công thức nhẹ nhàng, không phá vỡ hàng rào bảo vệ tự nhiên của da và chứa các thành phần giúp duy trì độ ẩm cân bằng da. Cerave Foaming Cleanser chứa Ceramides, Axit Hyaluronic và Niacinamide giúp duy trì hàng rào bảo vệ da, khóa ẩm và làm dịu làn da của bạn.
                Loại da phù hợp: 
Sản phẩm thích hợp cho da thường đến dầu.

Có thể sử dụng cho mặt và toàn thân.

Giải pháp cho tình trạng da: 
Da thường tiết bã nhờn, dầu thừa, lỗ chân lông to. 
Ưu thế nổi bật: 
3 loại Ceramides (1, 3, 6-II) thiết yếu giúp khôi phục hàng rào độ ẩm da. 

Hyaluronic Acid giúp duy trì độ ẩm tự nhiên của da.

Niacinamide giúp làm dịu, nuôi dưỡng, củng cố hàng rào da.

Kết cấu dạng gel tạo bọt giúp làm sạch sâu, loại bỏ dầu thừa, thông thoáng lỗ chân lông nhưng vẫn duy trì độ ẩm tự nhiên của da.',
                'image' => asset('asset/images/google-shopping-sua-rua-mat-cerave-tao-bot-cho-da-thuong-den-da-dau-88ml-1660554723_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/sua-rua-mat-cerave-tao-bot-cho-da-thuong-den-da-dau-88ml-2-1660554777_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/sua-rua-mat-cerave-tao-bot-cho-da-thuong-den-da-dau-1.jpg'),
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'Kem Dưỡng CeraVe Cho Da Khô 454g',
                // 'category_id' => 338,
                // 'brand_id' => 7,
                // 'skin_id' => 234,
                'desc' => 'Kem Dưỡng Cerave Cho Da Khô là sản phẩm kem dưỡng đến từ thương hiệu mỹ phẩm Cerave của Mỹ, với 3 ceramide tự nhiên và Axit Hyaluronic, những chất cần thiết trong việc hỗ trợ hàng rào bảo vệ da và duy trì độ ẩm. Sử dụng công nghệ phân phối MVE đã được cấp bằng sáng chế để giúp bổ sung ceramides và cung cấp quá trình hydrat hóa lâu dài có kiểm soát, khoá ẩm cho làn da suốt cả ngày.
                Loại da phù hợp: 
Sản phẩm thích hợp cho da khô đến rất khô.

Có thể sử dụng cho mặt và toàn thân.

Giải pháp cho tình trạng da: 
Da thiếu nước, thiếu ẩm. 

Da khô ráp, sần sùi, bong tróc.

Da bị chàm. 

Ưu thế nổi bật: 
3 loại Ceramides (1, 3, 6-II) thiết yếu giúp khôi phục hàng rào độ ẩm da. 

Công nghệ MVE độc quyền khoá ẩm cho da suốt 24 giờ. 

Hyaluronic Acid giúp duy trì độ ẩm tự nhiên của da.

Sản phẩm không có mùi, không gây mụn và không gây dị ứng.
Độ an toàn: 
Không xà phòng 

Không hương liệu 

Không chứa paraben 

Không bít tắc lỗ chân lông 

Đã được kiểm nghiệm không gây kích ứng.

Bảo quản:
Nơi khô ráo thoáng mát.

Tránh ánh nắng trực tiếp, nơi có nhiệt độ cao hoặc ẩm ướt.

Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/kem-duong-cerave-cho-da-kho-den-rat-kho-454g-2-1661138302_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/kem-duong-cerave-cho-da-kho-den-rat-kho-454g-1-1661138302_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/kem-duong-cerave-cho-da-kho-den-rat-kho-1.jpg'),
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'Sữa Rửa Mặt CeraVe Cho Da Thường 473ml',
                // 'category_id' => 112,
                // 'brand_id' => 7,
                // 'skin_id' => 791,
                'desc' => 'Sữa Rửa Mặt Cerave Sạch Sâu là sản phẩm sữa rửa mặt đến từ thương hiệu mỹ phẩm Cerave của Mỹ, với sự kết hợp của ba Ceramides thiết yếu, Hyaluronic Acid sản phẩm giúp làm sạch và giữ ẩm cho làn da mà không ảnh hưởng đến hàng rào bảo vệ da mặt và cơ thể.
                Sữa Rửa Mặt Cerave Foaming Cleanser kết cấu dạng gel tạo bọt rất lý tưởng để loại bỏ dầu thừa, bụi bẩn và lớp trang điểm với công thức nhẹ nhàng, không phá vỡ hàng rào bảo vệ tự nhiên của da và chứa các thành phần giúp duy trì độ ẩm cân bằng da. Cerave Foaming Cleanser chứa Ceramides, Axit Hyaluronic và Niacinamide giúp duy trì hàng rào bảo vệ da, khóa ẩm và làm dịu làn da của bạn.
                Loại da phù hợp: 
Sản phẩm thích hợp cho da thường đến dầu.

Có thể sử dụng cho mặt và toàn thân.

Giải pháp cho tình trạng da: 
Da thường tiết bã nhờn, dầu thừa, lỗ chân lông to. 
Ưu thế nổi bật: 
3 loại Ceramides (1, 3, 6-II) thiết yếu giúp khôi phục hàng rào độ ẩm da. 

Hyaluronic Acid giúp duy trì độ ẩm tự nhiên của da.

Niacinamide giúp làm dịu, nuôi dưỡng, củng cố hàng rào da.

Kết cấu dạng gel tạo bọt giúp làm sạch sâu, loại bỏ dầu thừa, thông thoáng lỗ chân lông nhưng vẫn duy trì độ ẩm tự nhiên của da.',
                'image' => asset('asset/images/google-shopping-sua-rua-mat-cerave-cho-da-thuong-den-kho-473ml-1660553029_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/sua-rua-mat-cerave-cho-da-thuong-den-kho-2.jpg'),
                'image2' => asset('asset/images/sua-rua-mat-cerave-cho-da-thuong-den-kho-473ml-1-1660553029_img_358x358_843626_fit_center.jpg'),
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Nước Tẩy Trang Bioderma Dành Cho Da Nhạy Cảm 500ml',
                // 'category_id' => 321,
                // 'brand_id' => 6,
                // 'skin_id' => 789,
                'desc' => 'Nước Tẩy Trang Dành Cho Da Nhạy Cảm Bioderma Sensibio H2O là sản phẩm nước tẩy trang công nghệ Micellar đầu tiên trên thế giới, do thương hiệu dược mỹ phẩm Bioderma nổi tiếng của Pháp phát minh. Dung dịch giúp làm sạch sâu da và loại bỏ lớp trang điểm nhanh chóng mà không cần rửa lại bằng nước. Công thức dịu nhẹ, không kích ứng, không gây khô căng da, đặc biệt phù hợp với làn da nhạy cảm.
                Da nhạy cảm đến da không dung nạp không thể thực hiện vai trò của mình như một hàng rào bảo vệ chống lại các tác nhân gây kích ứng. Lớp trang điểm, việc tẩy trang, sự ô nhiễm, các tác động từ bên ngoài khiến làn da bị yếu đi và trở nên khô căng ngày này qua ngày khác. Da nhạy cảm biểu hiện thông qua cảm giác nóng, khó chịu và mẩn đỏ lan rộng hoặc cục bộ. Da dễ bị mất nước và tình trạng da khô kéo dài sẽ tự động duy trì độ mỏng manh của làn da, dẫn đến cảm giác khô căng khó chịu. Tình trạng da nhạy cảm quá mức có thể chỉ xảy ra tạm thời hoặc vĩnh viễn.

Công nghệ micellar sử dụng các hạt micelles "thần kì" tương thích hoàn hảo với lớp lipid tự nhiên của da. Yếu tố cấu thành nên hạt micelle là các ester acid béo, tương tự như cấu trúc lớp phospholipid của màng tế bào da, giúp tái tạo lớp màng hydrolipid của da một cách tự nhiên. Nhờ vào cấu trúc này, các hạt micelle sẽ giúp lấy đi các yếu tố có hại cho làn da như:

98% bụi siêu mịn khỏi bề mặt da và sâu bên trong lỗ chân lông

78% kim loại nặng và độc tố gây hại

99% lớp trang điểm sâu bên trong
Sensibio H2O được bào chế với độ pH sinh lý khoảng 5.5 tương tự như độ pH của làn da, do đó giúp nâng niu sự cân bằng về mặt sinh học - điều cần thiết để duy trì làn da khỏe mạnh. Bên cạnh đó, sản phẩm chứa thành phần nước tinh khiết, đạt chuẩn dược phẩm và một hợp chất bao gồm 3 loại đường mô phỏng sinh học có công dụng làm dịu và ngăn ngừa các phản ứng viêm. Việc lựa chọn cẩn thận các thành phần đảm bảo khả năng dung nạp hoàn hảo và loại bỏ bất kỳ nguy cơ gây tổn thương da nào của sản phẩm.
Loại da phù hợp:
Sản phẩm dành cho da thường, da nhạy cảm và da kém dung nạp.
Công dụng:
Phù hợp với mọi loại da và dung nạp tốt.

Làm sạch, loại bỏ lớp trang điểm cho mặt và mắt.

Làm dịu và xua tan cảm giác khó chịu đối với da đang kích ứng.

Duy trì độ cân bằng của làn da, cung cấp đủ độ ẩm cho da.

Mang lại cảm giác sảng khoái & tươi mới tức thì.

Không cần rửa lại với nước.',
                'image' => asset('asset/images/google-shopping-nuoc-tay-trang-bioderma-danh-cho-da-nhay-cam-500ml-2_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/nuoc-tay-trang-bioderma-danh-cho-da-nhay-cam-500ml-5_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/nuoc-tay-trang-bioderma-danh-cho-da-nhay-cam-2_1.jpg'),
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'Nước Tẩy Trang Bioderma Dành Cho Da Dầu 500ml',
                // 'category_id' => 321,
                // 'brand_id' => 6,
                // 'skin_id' => 123,
                'desc' => 'Nước Tẩy Trang Bioderma Sébium H2O là sản phẩm tẩy trang dành cho da dầu, da hỗn hợp đến từ thương hiệu dược mỹ phẩm Bioderma, được ứng dụng công nghệ Micellar đình đám giúp loại bỏ lớp trang điểm cùng bụi bẩn và dầu thừa trên da hiệu quả mà không gây khô căng hay nhờn rít, tạo cảm giác thông thoáng cho da sau một ngày dài mệt mỏi.
                Da hỗn hợp đến da dầu có lượng bã nhờn dư thừa tập trung ở vùng chữ T (da hỗn hợp) hoặc trên toàn bộ khuôn mặt (da dầu). Các dấu hiệu lâm sàng đi kèm với loại da này là tình trạng bóng dầu, da xỉn màu và lỗ chân lông to. Đôi khi còn có thể xuất hiện mụn trứng cá hoặc mụn đầu đen. Nếu những dấu hiệu này cứ liên tục tái phát, da được coi là có xu hướng dễ bị mụn.

Nước Tẩy Trang Bioderma Sébium H2O được bào chế chuyên biệt dành cho làn da dầu & hỗn hợp, có khả năng "bắt chước" các thành phần tự nhiên của làn da để loại bỏ lớp trang điểm một cách tối ưu nhất, trong khi vẫn duy trì được độ cân bằng pH và độ ẩm tự nhiên của da, bảo đảm an toàn cho kể cả những làn da nhạy cảm nhất.
Đặc biệt, công nghệ Micellar Water sử dụng các hạt phân tử mi-xen với 2 đầu ưa dầu - nước, giúp hút hết bã nhờn, bụi bẩn của da, mỹ phẩm trang điểm và ô nhiễm không khí bám lại trên da sau một ngày dài mà không hề để lại cảm giác bóng nhờn, dính rít như nhiều loại nước tẩy trang thông thường khác.

Bên cạnh đó, Sébium H2O còn được làm giàu thêm với các hoạt chất thanh lọc làn da, kẽm gluconate và đồng sunfat giúp làm sạch sâu và loại bỏ bã nhờn, hạn chế lượng dầu thừa tiết ra, mang lại làn da thông thoáng sạch mịn.
Loại da phù hợp:
Sản phẩm phù hợp cho da hỗn hợp đến da dầu.
Giải pháp cho tình trạng da:
Dầu thừa - lỗ chân lông to

Da mụn hoặc dễ nổi mụn

Công dụng:
Nhẹ nhàng làm sạch mà không làm khô da.

Thanh lọc da và hạn chế bã nhờn với phức hợp điều chỉnh bã nhờn.

Mang lại cảm giác tươi mát tức thì.

Loại bỏ lớp trang điểm hiệu quả.

Dung nạp tốt - Không gây mụn - Không cần rửa lại với nước.',
                'image' => asset('asset/images/google-shopping-nuoc-tay-trang-bioderma-danh-cho-da-dau-hon-hop-500ml-1_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/nuoc-tay-trang-bioderma-danh-cho-da-dau-hon-hop-500ml-06_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/nuoc-tay-trang-bioderma-danh-cho-da-dau-hon-hop-500ml-07_img_358x358_843626_fit_center.jpg'),
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'Kem Dưỡng Bioderma Hỗ Trợ Phục Hồi Da Tổn Thương 40ml',
                // 'category_id' => 338,
                // 'brand_id' => 6,
                // 'skin_id' => 791,
                'desc' => 'Bioderma Cicabio Crème là sản phẩm kem dưỡng ẩm hỗ trợ phục hồi và làm dịu làn da tổn thương, da nhạy cảm - kích ứng đến từ thương hiệu dược mỹ phẩm Bioderma nổi tiếng của Pháp, được các bác sĩ da liễu Pháp tin dùng. Sản phẩm có khả năng làm giảm các triệu chứng ngứa và khó chịu gần như ngay lập tức, đồng thời dưỡng ẩm và khôi phục lớp biểu bì, tạo lớp màng bảo vệ da tối ưu mà vẫn mỏng nhẹ và thoáng khí, giúp da luôn thoải mái dễ chịu.
                                            Sau liệu trình điều trị thẩm mỹ chuyên sâu như laser, lăn kim, peel da hay nặn mụn,... da có xu hướng trở nên nhạy cảm và dễ bị tác động bởi các yếu tố bên ngoài.
                            Đừng lo lắng vì đã có Kem Dưỡng Phục Hồi Da Bioderma Cicabio Crème chính là “vị cứu tinh” cho bạn, giúp làn da tổn thương được chăm sóc đúng cách và phục hồi nhanh chóng.


                            Bioderma Cicabio Crème là sự kết hợp hiệp đồng của các thành phần resveratrol, đồng và centella asiatica sẽ đẩy mạnh khả năng phục hồi của làn da. Bên cạnh đó, thành phần kẽm giúp ngăn chặn sự phát triển vi khuẩn. Bổ sung đồng thời với Antalgicine™ nhanh chóng làm dịu cảm giác khó chịu và giảm thôi thúc muốn gãi. Nhờ vào đó, sản phẩm giúp hồi phục làn da bị kích ứng bằng cách tác động vào từng giai đoạn của quá trình tái cấu trúc sinh học của lớp biểu bì.

                            Sử dụng Bioderma Cicabio Crème là giải pháp hiệu quả để phục hồi da tổn thương và hạn chế sẹo - thâm.

                            Kem Dưỡng Ẩm Hỗ Trợ Phục Hồi Và Làm Dịu Làn Da Tổn Thương Bioderma Cicabio Crème 40ml hiện đã có mặt tại Hasaki. 

                            Loại da phù hợp:
                            Kem Dưỡng Ẩm Bioderma Cicabio Creme phù hợp cho mọi loại da, đặc biệt là da nhạy cảm.

                            Là giải pháp chăm sóc dành cho mọi thành viên trong gia đình, kể cả trẻ sơ sinh (trừ trẻ sinh non).

                            Có thể sử dụng cho cả da mặt và da cơ thể.

                            Giải pháp cho tình trạng da:
                            Mọi vùng da trên cơ thể bị tổn thương, kích ứng.

                            Da khô căng, ngứa, bong tróc vẩy.

                            Da tổn thương sau trị liệu thẩm mỹ: peel da nông, laser không xâm lấn, triệt lông,...

                            Da tổn thương nhẹ: trầy xước, vết đứt nhẹ, phồng rộp da, mụn vừa mới lành...
                            Độ an toàn:
                            Không chứa paraben

                            Không mùi hương

                            Không chứa thành phần tạo màu

                            Màu nâu nhạt của sản phẩm là màu tự nhiên của hoạt chất

                            Độ dung nạp tốt

                            Không gây mụn

                            Bảo quản:
                            Nơi khô ráo, thoáng mát.

                            Tránh ánh nắng trực tiếp.

                            Đậy nắp kín sau khi sử dụng.',
                'image' => asset('asset/images/google-shopping-kem-duong-bioderma-phuc-hoi-va-lam-diu-da-bi-kich-ung-40ml-1_img_358x358_843626_fit_center.jpg'),
                'images' => asset('asset/images/kem-duong-bioderma-ho-tro-phuc-hoi-va-lam-diu-da-40ml-3_img_358x358_843626_fit_center.jpg'),
                'image2' => asset('asset/images/kem-duong-bioderma-ho-tro-phuc-hoi-va-lam-diu-da-40ml-4_img_358x358_843626_fit_center.jpg'),
            ),
        ]);
    }
}
