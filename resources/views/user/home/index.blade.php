@extends('layouts.app')
@section('content')
<div>
    <div class="hero-wrap" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-8 ftco-animate d-flex align-items-end">
                    <div class="text w-100 text-center">
                        <h1 class="mb-4">Một làn da <span>ĐẸP</span> và <span>TỰ TIN</span>.</h1>
                        <p><a href="#" class="btn btn-primary py-2 px-4">Cửa hàng</a> <a href="{{route('user.about')}}" class="btn btn-white btn-outline-white py-2 px-4">Thông tin</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-intro">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-4 d-flex">
                    <div class="intro d-lg-flex w-100 ftco-animate">
                        <div class="icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="text">
                            <h2>Hỗ trợ trực tuyến 24/24</h2>
                            <p>Sẵn sàng hỗ trợ khách hàng 24/24 khi khách hàng cần</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-1 d-lg-flex w-100 ftco-animate">
                        <div class="icon">
                            <span class="flaticon-cashback"></span>
                        </div>
                        <div class="text">
                            <h2>Giá rẻ bất ngờ</h2>
                            <p>Giá thàn hợp lí với nhiều ưu đãi hấp dẫn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="intro color-2 d-lg-flex w-100 ftco-animate">
                        <div class="icon">
                            <span class="flaticon-free-delivery"></span>
                        </div>
                        <div class="text">
                            <h2>Vận chuyển nhanh chóng</h2>
                            <p>Sau khi nhận được đơn hàng, chúng tôi sẽ nhanh chóng và bạn sẽ nhận được hàng từ 2 đến 3 ngày.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                @foreach($brands as $brand)
                <div class="col-lg-2 col-md-4 ">
                    <div class="sort w-100 text-center ftco-animate">
                        <div class="img" style="background-image: url({{asset('storage/'.$brand->image)}});"></div>
                        <h3>{{$brand->name}}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @if(Auth::check())
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span>
                        <h2>Có Thể Bạn Sẽ Thích</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($suggestion as $product)
                    <div class="col-md-3 d-flex">
                        <div class="product ftco-animate shadow">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('storage/'.$product->image)}});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                        <a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <span class="sale">Gợi ý</span>
                                <h2>{{ Illuminate\Support\Str::limit($product->name, 25) }}</h2>
                                <p class="mb-0"><span class="price">{{$product->price}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @foreach ($products as $index => $group)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <!-- <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span> -->
                        <h2>Sản Phẩm {{ $index }}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($group as $product)
                    <div class="col-md-3 d-flex">
                        <div class="product ftco-animate shadow">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('storage/'.$product->image)}});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                        <a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <!-- <span class="sale">Sale</span> -->
                                <!-- <span class="category">Brandy</span> -->
                                <h2>{{ Illuminate\Support\Str::limit($product->name, 25) }}</h2>
                                <p class="mb-0 fw-bolder"><span class="price">{{$product->price}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <a href="{{ route('user.shop', ['categoryId' => $product->category_id]) }}" class="btn btn-primary d-block">Tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    @else
         @foreach ($products as $index => $group)
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center pb-5">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <!-- <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span> -->
                        <h2>Sản Phẩm {{ $index }}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($group as $product)
                    <div class="col-md-3 d-flex">
                        <div class="product ftco-animate shadow">
                            <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('storage/'.$product->image)}});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                        <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                        <a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <!-- <span class="sale">Sale</span> -->
                                <!-- <span class="category">Brandy</span> -->
                                <h2>{{ Illuminate\Support\Str::limit($product->name, 25) }}</h2>
                                <p class="mb-0 "><span class="price">{{$product->price}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <a href="{{ route('user.shop', ['categoryId' => $product->category_id]) }}" class="btn btn-primary d-block">Tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    @endif
    <section class="ftco-section testimony-section img" style="background-image: url(asset/images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Lời Chứng Thực</span>
                    <h2 class="mb-3">Khách Hàng Phản Hồi</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(asset/images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(asset/images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(asset/images/person_3.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(asset/images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-quote-left"></div>
                                <div class="text">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(asset/images/person_2.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection