<div>
    <div id="wrap-inner">
        <div id="khach-hang">
            <h3>Thông tin khách hàng</h3>
            <p><span class="info">Khách hàng: </span> {{$order->name}} </p>
            <p><span class="info">Email: </span> {{$order->email}} </p>
            <p><span class="info">Điện thoại: </span> {{$order->phone}} </p>
            <p><span class="info">Địa chỉ: </span>  {{ $order->address}},{{ Auth()->user()->ward()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->name}} </p>
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
                </tr>
                @foreach($order->details as $orderItem)
                <tr>
                    <td> {{ $orderItem->product->name}}</td>
                    <td class="price"> {{ $orderItem->price}}VND</td>
                    <td>{{ $orderItem->quantity}}</td>
                </tr>
                @endforeach
                <tr style="color: red;font-size:20px">
                    <td><b>Tổng tiền:</b> {{number_format($order->totalamount)}}VNĐ</td>
                    <td class="total-price"></td>
                </tr>
            </table>
        </div>
        <div id="xac-nhan">
            <br>
            <p alignt="justify">
                <b>Quý khách đã đặt hàng thành công!</b><br />
                • Sản phẩm của Quý khách sẽ được chuyển đến địa chỉ có trong phần thông tin hhách hàng của chúng tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
                • Nhân viên giao hàng sẽ liên hệ với quý khách qua số điện thoại trước khi giao hàng 24 tiếng.<br />
                <b><br/>Cám ơn Quý khách đã tin tưởng lựa chọn sản phẩm của BaBich!</b>
            </p>
        </div>
    </div>
</div>