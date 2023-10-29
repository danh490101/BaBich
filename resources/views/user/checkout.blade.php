@extends('layouts.app')
@section('content')
<div>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Thanh toán <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Thanh Toán</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">
                    <form action="{{ route('user.checkout.store') }}" method="post" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Tên khách hàng</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="" value="{{$user->name}}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <!-- <div class="w-100"></div>
                            <div class="w-100"></div> -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="" value="{{$user->address}}">
                                    @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="" value="{{$user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                        </div>
                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>{{ number_format($cart['totalPrice']) }}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <input type="text" name="delivery_cost" class="form-control" placeholder="" value="{{ number_format(round($cart['totalPrice']*0.05)) }}" hidden>
                                        <span>{{ number_format(round($cart['totalPrice']*0.05)) }}</span>
                                    </p>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discount">Nhập mã giảm giá</label>
                                            <input type="text" name="code" class="form-control" placeholder="" value="">
                                        </div>
                                    </div>
                                    <!-- <p class="d-flex">
                                        <span>Discount</span>
                                        <span>00</span>
                                    </p> -->
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <input type="text" name="totalamount" class="form-control" placeholder="" value="{{ round($cart['totalPrice']*0.05 + $cart['totalPrice']) }}" hidden>
                                        <span>{{ number_format(round($cart['totalPrice']*0.05 + $cart['totalPrice'])) }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input name="payment_method" value="COD" type="radio" name="optradio" class="mr-2">Thanh toán nhận hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input name="payment_method" value="VNPAY" type="radio" name="optradio" class="mr-2"> VNPay</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" class="mr-2"> Đã kiểm tra và đồng ý</label>
                                            </div>
                                        </div>
                                    </div>

                                    @error('payment_method')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                    <button type="submit" id="orderButton" class="btn btn-primary py-3 px-4">
                                        <span class="btn-txt">Đặt hàng</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection