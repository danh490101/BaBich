<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
    <style>
        * {
            font-family: DejaVu Sans !important;
        }
    </style>
    <style>
        body {
            font-family: sans-serif;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        .thank-you {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }

        p {
            color: #555;
        }

        .order-details {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Xác Nhận Đơn Hàng</h2>
    <div id="customer-info">
        <h3>Thông Tin Khách Hàng</h3>
        <p><span class="info">Khách Hàng: </span> {{$order->name}} </p>
        <p><span class="info">Email: </span> {{$order->email}} </p>
        <p><span class="info">Điện Thoại: </span> {{$order->phone}} </p>
        <p><span class="info">Địa Chỉ: </span> {{ $order->address}},{{ Auth()->user()->ward()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->name}} </p>
        <p><span class="info">Phương Thức Thanh Toán: </span> @if ($order->payment_method == "COD")
            Thanh toán khi nhận hàng
            @else 
            Thanh toán trực tuyến
            @endif
        </p>
    </div>

    <div class="thank-you">
        <p>Cảm ơn bạn đã đặt hàng từ cửa hàng của chúng tôi. Đơn hàng của bạn đã được xác nhận thành công.</p>
    </div>

    <div class="order-details">
        <h3>Chi Tiết Đơn Hàng</h3>
        <table>
            <tr class="bold">
                <td width="25%"><b>Tên Sản Phẩm</b></td>
                <td width="20%"><b>Giá</b></td>
                <td width="20%"><b>Số Lượng</b></td>
            </tr>
            @foreach($order->details as $orderItem)
            <tr>
                <td> {{ $orderItem->product->name}}</td>
                <td class="price"> {{ $orderItem->price}}VND</td>
                <td>{{ $orderItem->quantity}}</td>
            </tr>
            @endforeach
        </table>
        <div style="color: red;font-size:20px">
            <p><b>Tổng Tiền:</b> {{number_format($order->totalamount)}}VNĐ</p>
            <p><b>Giảm Giá:</b> {{number_format($order->discountValue)}}VNĐ</p>
            <p><b>Tổng Cộng:</b> {{number_format($order->totalamount - $order->discountValue)}}VNĐ</p>
        </div>
    </div>

    <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ chúng tôi qua email: babich@gmail.com</p>

    <p>Cảm ơn bạn đã chọn cửa hàng của chúng tôi!</p>
</body>

</html>