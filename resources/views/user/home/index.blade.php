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
                        <p><a href="{{route('user.shop')}}" class="btn btn-primary py-2 px-4">Cửa hàng</a> <a href="{{route('user.about')}}" class="btn btn-white btn-outline-white py-2 px-4">Thông tin</a></p>
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
                @php
                $i=0
                @endphp
                @foreach($brands as $brand)
                @if($i==6)
                @break
                @endif
                @php
                $i++
                @endphp
                <div class="col-lg-2 col-md-4 ">
                    <div class="sort w-100 text-center ftco-animate">
                        <div class="img" style="background-image: url({{asset($brand->image)}});"></div>
                        <h3>{{$brand->name}}</h3>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container12">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!-- <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span> -->
                    <h2>Sản Phẩm giảm giá</h2>
                </div>
            </div>
            <div class="row card shadow" style="background: #FF8E4D">
                <div class="col-sm-12  d-flex flex-wrap">
                    @foreach($discountList as $product)
                    <div class="col-sm-3">
                        <div class="product ftco-animate shadow mt-3" style="background: #fff">
                            <div class="sale-badge">
                                Giảm giá
                            </div>
                            <div class="mt-3 img d-flex align-items-center justify-content-center m-5" style="background-image: url({{asset($product['item']->image)}});">
                                <div class="desc">
                                    <p class="meta-prod d-flex">
                                        <a href="{{route('add_to_cart',['id' => $product['item']->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                        <a href="{{ route('user.add_to_favorites', ['productId' => $product['item']->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart favorite-icon"><input type="hidden" value=" $product['item']->id"></span></a>
                                        <a href="{{ route('user.product-details', ['product' => $product['item']->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="text text-center">
                                <!-- <span class="sale">Sale</span> -->
                                <span class="category">{{$product['item']->category->name}}</span>
                                <h5>{{ Illuminate\Support\Str::limit($product['item']->name, 25)}}</h5>
                                <p class="mb-0 "><span class="price price-sale">{{number_format($product['item']->price,0, ',','.')}}</span> <span class="price fw-bolder"> {{ number_format($product['value'],0, ',','.')}}</span></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @if(Auth::check())
    <section class="ftco-section">
        <div class="container12">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span>
                    <h2>Có Thể Bạn Sẽ Thích</h2>
                </div>
            </div>
            <div class="row">
                @php
                $i=0
                @endphp
                @foreach($suggestion as $product)
                @if($i==4)
                @break
                @endif
                @php
                $i++
                @endphp
                <div class="col-md-3 d-flex">
                    <div class="product ftco-animate shadow mt-3">
                        <div class="img d-flex align-items-center justify-content-center m-5" style="background-image: url({{asset($product->image)}});">
                            <div class="desc">
                                <p class="meta-prod d-flex">
                                    <a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                    <a href="{{ route('user.add_to_favorites', ['productId' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                    <a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                </p>
                            </div>
                        </div>
                        <div class="text text-center">
                            <span class="sale">Gợi ý</span>
                            <span class="category">{{$product->category->name}}</span>
                            <h2>{{ Illuminate\Support\Str::limit($product->name, 25)}}</h2>
                            <p class="mb-0"><span class="price">{{number_format($product->price,0, ',','.')}}</span></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb">
        <div class="row col-12 justify-content-center">
            <div class="col-2">
                <div class="card13">
                    <div class="text-center font-weight-bold">Tuýp chăm da cho bạn nên biết biết!</div>
                    <img src="{{asset('asset/images/beauty-treatment.png')}}" class="navbar-brand-img">
                </div>
            </div>
            <div class="row col-10">
                <div class="col-2">
                    <div class="col-1 skin-item pl-5 ml-5">
                        <div class="card12">
                            <div class="text-center font-weight-bold">Cần sử dụng kem chống nắng hằng ngày cho dù nắng hay mưa!</div>
                            <img style="height: 55px; width: 55px; position: absolute; top: 80%; left: 200%; transform: translate(-50%, -50%);" src="{{asset('asset/images/sunscreen.png')}}" class="navbar-brand-img">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-1 skin-item ml-5 pl-4">
                        <div class="card12">
                            <div class="text-center font-weight-bold">Cho dù là da gì bạn cũng sẽ cần khóa ẩm lại sau các bước dưỡng.</div>
                            <img style="height: 55px; width: 55px; position: absolute; top: 80%; left: 260%; transform: translate(-50%, -50%);" src="{{asset('asset/images/cream.png')}}" class="navbar-brand-img">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-1 skin-item ml-5">
                        <div class="card12">
                            <div class="text-center font-weight-bold">Serum là một sản phẩm chăm sóc da chuyên sâu.</div>
                            <img style="height: 55px; width: 55px; position: absolute; top: 80%; left: 260%; transform: translate(-50%, -50%);" src="{{asset('asset/images/serum.png')}}" class="navbar-brand-img">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-1 skin-item ml-5">
                        <div class="card12">
                            <div class="text-center font-weight-bold">Sữa rửa mặt là bước không thể thiếu trong chăm sóc da hàng ngày.</div>
                            <img style="height: 55px; width: 55px; position: absolute; top: 80%; left: 260%; transform: translate(-50%, -50%);" src="{{asset('asset/images/wash-face.png')}}" class="navbar-brand-img">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="col-1 skin-item ml-5">
                        <div class="card12">
                            <div class="text-center font-weight-bold">Mặt nạ giấy giải pháp nhanh, hiệu quả mang lại sự tươi mới cho làn da.</div>
                            <img style="height: 55px; width: 55px; position: absolute; top: 80%; left: 260%; transform: translate(-50%, -50%);" src="{{asset('asset/images/sheet-mask.png')}}" class="navbar-brand-img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    @php
    $i=0
    @endphp
    @foreach ($products as $index => $group)
    @if($i==3)
    @break
    @endif
    @php
    $i++
    @endphp
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <!-- <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span> -->
                    <h2>Sản Phẩm {{$mappingCates[$index] ?? '-'}}</h2>
                </div>
            </div>
            <div class="row ">
                @php
                $i=0
                @endphp
                @foreach($group as $product)
                @if($i==4)
                @break
                @endif
                @php
                $i++
                @endphp
                <div class="col-md-3 d-flex ">
                    <div class="product ftco-animate shadow">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset($product->image)}});">
                            <div class="desc">
                                <p class="meta-prod d-flex">
                                    <a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                    <a href="{{ route('user.add_to_favorites', ['productId' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                    <a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                </p>
                            </div>
                        </div>
                        <div class="text text-center">
                            <span class="category">{{$product->category->name}}</span>
                            <h2>{{ Illuminate\Support\Str::limit($product->name, 25)}}</h2>
                            <p class="mb-0 "><span class="price">{{number_format($product->price,0, ',','.')}}</span></p>
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
    <!-- <section class="ftco-section testimony-section img" style="background-image: url(asset/images/bg_4.jpg);">
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
    </section> -->
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

</script>