<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác Nhận Đơn Hàng</title>
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
    <h2>Order Confirmation</h2>
    <div id="customer-info">
        <h3>Customer Information</h3>
        <p><span class="info">Customer: </span> {{$order->name}} </p>
        <p><span class="info">Email: </span> {{$order->email}} </p>
        <p><span class="info">Phone: </span> {{$order->phone}} </p>
        <p><span class="info">Address: </span> {{ $order->address}},{{ Auth()->user()->ward()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->name}} </p>
        <p><span class="info">Payment Method: </span> @if ($order->payment_method == 1)
            Cash on Delivery
            @else ($order->payment_method == 2)
            Online Payment
            @endif
        </p>
    </div>

    <div class="thank-you">
        <p>Thank you for ordering from our store. Your order has been successfully confirmed.</p>
    </div>

    <div class="order-details">
        <h3>Order Details</h3>
        <table>
            <tr class="bold">
                <td width="25%"><b>Product Name</b></td>
                <td width="20%"><b>Price</b></td>
                <td width="20%"><b>Quantity</b></td>
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
            <p><b>Total Amount:</b> {{number_format($order->totalamount)}}VNĐ</p>
            <p><b>Discount:</b> {{number_format($order->discountValue)}}VNĐ</p>
            <p><b>Final Amount:</b> {{number_format($order->totalamount - $order->discountValue)}}VNĐ</p>
        </div>
    </div>

    <p>If you have any questions, please contact us via email: babich@example.com</p>

    <p>Thank you for choosing our store!</p>
</body>


</html>