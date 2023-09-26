@extends('layouts.app')
@section('content')
<div>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Checkout <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Thanh Toán</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">
                    <form action="{{route('user.checkout.store')}}" method="post" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Tên khách hàng</label>
                                    <input type="text" class="form-control" placeholder="{{$user->name}}">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="House number and street name">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email</label>
                                    <input type="text" class="form-control" placeholder="" value="{{$user->email}}">
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
                                        <span>{{ number_format($cart['totalPrice'],3) }}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <span>{{ number_format(round($cart['totalPrice']*0.05),3) }}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Discount</span>
                                        <span>00</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>{{ number_format(round($cart['totalPrice']*0.05 + $cart['totalPrice']),3) }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2">Thanh toán nhận hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
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
                                    <button type="submit" class="btn btn-primary py-3 px-4">
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