@extends('layouts.app')
@section('content')
<div>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Lịch sử <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Lịch sử mua sắm</h2>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="row mt-3 ml-3">
            <input type="hidden" id="status_current" value="{{$status}}">
            <button class="btn-96"><a href="{{route('user.order-history',['status' => '0'])}}"><span>Chờ xác nhận</span></a></button>
            <button class="btn-96"><a href="{{route('user.order-history',['status' => '1'])}}"><span>Đã xác nhận</span></a></button>
            <button class="btn-96"><a href="{{route('user.order-history',['status' => '2'])}}"><span>Đang giao hàng</span></a></button>
            <button class="btn-96" style="width: 240px;"><a href="{{route('user.order-history',['status' => '3'])}}"><span>Giao hàng thành công</span></a></button>
        </div>
    </section>
    <section class="ftco-section  mb-5">
        <div class="container mb-5">
            <div class="col-12 ">
                <ul class="progressbar">
                    <li id="0" class="active">Chờ xác nhận</li>
                    <li id="1">Đã xác nhận</li>
                    <li id="2">Đang giao hàng</li>
                    <li id="3">Giao hàng thành công</li>
                </ul>

            </div>
        </div>
    </section>
    <section class="ftco-section  mb-5">
        <section class="ftco-section">
            @foreach($orders as $order)
            <div class="container card">
                <div class=" card-body">
                    <div class="row">
                        <h2 class="order-id" style="padding-right: 130px;"><strong>#{{$order->id}}</strong></h2>
                    </div>
                    <div class="row">
                        <article class="card col-12 pl-5">
                            <div class="card-body col-12 row">
                                <div class="col-3"> <strong>Ngày đặt hàng:</strong> <br>{{ $order->created_at->format('d-m-Y') }} </div>
                                <div class="col-3"> <strong>Phương thức thanh toán:</strong> <br> @if ($order->payment_method == 'COD')
                                                                    Thanh toán khi nhận hàng
                                                                @else ($order->payment_method == 'VNPAY')
                                                                    Thanh toán online
                                                                @endif</div>
                                <div class="col-3"> <strong>Số điện thoại giao hàng:</strong> <br> <i class="fa fa-phone"></i> {{
                                $order->phone }}</div>
                                <div class="col-3"> <strong>Địa chỉ giao hàng:</strong> <br> {{ $order->address}},
                                @if(Auth()->user()->ward_id != NULL)
                                {{ Auth()->user()->ward()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->name }},{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->name}}</div>
                                @endif
                            </div>
                        </article>
                    </div>

                    <div class="row">
                        @foreach($order->details()->get() as $item)
                        <div class="product-item col-md-6">
                            <img src="{{ asset( $item->product()->first()->image) }}" alt="Ảnh sản phẩm" class="product-image">
                            <div class="product-details">
                                <div class="product-name">{{ $item->product()->first()->name }}</div>
                                <div class="product-quantity">{{ $item->quantity }} x {{ number_format($item->product()->first()->price, 0, ',', '.') }} VNĐ</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr class="my-4" />
                    @if ($status == 0)
                    <form action="{{ route('user.order-history.destroy', ['id' => $order->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p>
                        <button type="submit" class="btn btn-primary ">Hủy đơn hàng</button>
                    </p>
                    </form>
                    @endif
                    <h3 class="mt-1 d-flex justify-content-end"><strong>Tổng tiền: {{ number_format($order->totalamount, 0, ',', '.') }} VNĐ</strong></h3>
                </div>
            </div>
            @endforeach
        </section>
    </section>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let status = $("#status_current").val()
            for (let i = 0; i <= status; i++) {
                $('#' + i).removeClass('active');
                $('#' + i).removeClass('complete');
                console.log($('#' + i).val())
                if (i == status) {
                    $('#' + i).addClass('active');
                } else {
                    $('#' + i).addClass('complete');
                }
            }
        });
    </script>