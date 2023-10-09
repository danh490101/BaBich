<div>
    <div id="wrap-inner">
        <div id="khach-hang">
            <h3>Thông tin khách hàng</h3>
            <p><span class="info">Khách hàng: </span> {{$order->name}} </p>
            <p><span class="info">Email: </span> {{$order->email}} </p>
            <p><span class="info">Điện thoại: </span> {{$order->phone}} </p>
            <p><span class="info">Địa chỉ: </span> {{$order->address}} </p>
            <p><span class="info">Phương thức thanh toán: </span> @if ($order->payment_method == 1)
                                                                    Thanh toán khi nhận hàng
                                                                @else ($order->payment_method == 2)
                                                                    Thanh toán online
                                                                @endif
                                                                </p>

        </div>
        <div id="hoa-don">
            <h3>Hóa đơn mua hàng</h3>
            <table class="table-bordered table-responsive">
                <tr class="bold">
                    <td width="25%"><b>Tên sản phẩm</b></td>
                    <td width="20%"><b>Giá</b></td>
                    <td width="20%"><b>Số lượng</b></td>
                    <td width="25%"><b>Thành tiền</b></td>
                </tr>
             
                <tr>
                    <td></td>
                    <td class="price"> VND</td>
                    <td></td>
                    <td class="price"> VND</td>
                </tr>

                <tr style="color: red;font-size:20px">
                    <td><b>Tổng tiền:</b>{{$order->totalamount}}</td>
                    <td class="total-price">VND</td>
                </tr>
            </table>
        </div>
        <div id="xac-nhan">
            <br>
            <p alignt="justify">
                <b>Quý khách đã đặt hàng thành công!</b><br />
                • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
                • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
                <b><br/>Cám ơn Quý khách đã tin tưởng lựa chọn sản phẩm của BaBich!</b>
            </p>
        </div>
    </div>
</div>