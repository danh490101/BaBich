@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span><a href="product.html">Sản phẩm <i class="fa fa-chevron-right"></i></a></span> <span>Chi tiết sản phẩm<i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Chi tiết sản phẩm</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ftco-animate">
                <div class="slider">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-75 mr-5" src="{{ asset( $product->image) }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-75 mr-5" src="{{ asset($product->images) }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-75 mr-5" src="{{ asset( $product->image2) }}" alt="Second slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- <div><img src="{{ asset('storage/' . $product->image) }}" width="550px" height="auto" class="img-fluid" alt="Image 1"></div>
                    <div><img src="{{ asset('storage/' . $product->image) }}" width="550px" height="auto" class="img-fluid" alt="Image 2"></div> -->
                    <!-- Thêm hình -->
                </div>
            </div>
            <div class="col-lg-6 product-details ftco-animate mt-5">
                <h3>{{$product->name}}</h3>
                @if (isset($discount))
                <p class="price"><span class="price price-sale" style="text-decoration: line-through;">{{number_format($product->price,0, ',','.')}}</span><span class="price fw-bolder"> {{ number_format($discount,0, ',','.')}}</span></p>
                @else
                <p class="price"><span>Giá: {{number_format($product->price,0, ',','.')}}đ</span></p>
                @endif
                <form action="{{route('add_to_cart',['id' => $product->id])}}" method="post">
                    <div class="row mt-4">
                        <div class="input-group col-md-6 d-flex mb-3">
                            <span class="input-group-btn mr-2">
                                <button id="decQty" type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            @csrf
                            <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
                                <button id="incQty" type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">Số lượng: {{$product ->quantity}}</p>
                        </div>
                    </div>
                    <p>
                        <button type="submit" class="btn btn-primary ">Thêm vào giỏ hàng</button>
                        @if(in_array($product->id, session('wishList')))
                        <a href="{{ route('user.add_to_favorites', ['productId' => $product->id]) }}">
                            <span><i class="fas fa-heart"></i></span>
                        </a>
                        @else
                        <a href="{{ route('user.add_to_favorites', ['productId' => $product->id]) }}">
                            <span class="flaticon-heart"></span>
                        </a>

                        @endif
                    </p>

                </form>
                <!-- <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;">Số lượng: {{$product ->quantity}}</p>
                    </div> -->
            </div>


        </div>

        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Mô Tả</a>
                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Đánh Giá</a>
                    <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Chính Sách và Dịch Vụ</a>
                </div>
            </div>
            <div class="col-md-12 tab-wrap">
                <div class="tab-content bg-light" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <!-- <h3 class="mb-4">{{$product->name}}</h3> -->
                            <div class="limited-height" style="white-space: pre-line;">
                                {!! $product->desc !!}
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                        <div class="p-4">
                            <h3 class="mb-4">Cửa Hàng Ba Bích</h3>
                            <div class="product_poli_wrap mb-3 p-2 border rounded">
                                <div class="h5 m-0 mb-2 font-weight-bold text-center">
                                    Chính sách - Dịch vụ
                                </div>
                                <div class="product_poli list-unstyled flex-column d-flex align-items-start m-0">
                                    <div class="row m-0">
                                        <div class="item d-flex align-items-center pb-2 pt-2 border-top w-100 col-12 col-sm-6 col-xl-12">
                                            <div class="w-32 mr-3">
                                            </div>
                                            <div class="media-body">
                                                <img src="{{asset('asset/images/shield.png')}}" class="navbar-brand-img" style="height: 50px; width:50px">
                                                Sản phẩm an toàn (Thương hiệu nổi tiếng). <b>Chính hãng</b>
                                            </div>
                                        </div>
                                        <div class="item d-flex align-items-center pb-2 pt-2 border-top w-100 col-12 col-sm-6 col-xl-12">
                                            <div class="w-32 mr-3">
                                            </div>
                                            <div class="media-body">
                                                <img src="{{asset('asset/images/commitment.png')}}" class="navbar-brand-img" style="height: 50px; width:50px">
                                                Chất lượng cam kết - Hoàn trả <b> 100%</b> + đền bù thêm <b> 100% </b>giá trị nếu gặp vấn đề do nhà sản xuất hoặc cửa hàng.
                                            </div>
                                        </div>
                                        <div class="item d-flex align-items-center pb-2 pt-2 border-top w-100 col-12 col-sm-6 col-xl-12">
                                            <div class="w-32 mr-3">
                                            </div>
                                            <div class="media-body">
                                                <img src="{{asset('asset/images/support.png')}}" class="navbar-brand-img" style="height: 50px; width:50px">
                                                <b>Dịch vụ vượt trội</b> (Hỗ trợ tận tình)
                                            </div>
                                        </div>
                                        <div class="item d-flex align-items-center pb-2 pt-2 border-top w-100 col-12 col-sm-6 col-xl-12">
                                            <div class="w-32 mr-3">
                                            </div>
                                            <div class="media-body">
                                                <img src="{{asset('asset/images/person.png')}}" class="navbar-brand-img" style="height: 50px; width:50px">
                                                Giao hàng nhanh chóng<br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>"Trải nghiệm mua sắm trực tuyến tuyệt vời tại chỗ chỉ cách một cú click!"</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <div class="row p-4">
                            <div class="col-md-7">
                                <h3 class="mb-4">Đánh giá
                                    (@if($avgRating == 0)
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    @else
                                    @for ($i=1; $i<=$avgRating ; $i++) <i class="fa fa-star"></i>
                                        @endfor
                                        @endif)
                                </h3>
                                @foreach($comments as $comment)
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">{{$comment['user']->name}}</span>
                                            <span class="text-right">{{date('d-m-Y', strtotime($comment['created_at']))}}</span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                @for ($i=1; $i<=$comment['rating']; $i++) <i class="fa fa-star"></i>
                                                    @endfor
                                            </span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>{{$comment['comment']}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <form action="{{route('user.feedback.store')}}" method="post">
                            @csrf
                            <div class="col-md-12 tab-wrap">
                                <div class="tab-content bg-light" id="v-pills-tabContent">
                                    <!-- <div class="rating">
                                        <input value="5" name="rating" id="star5" type="radio">
                                        <label for="star5"></label>
                                        <input value="4" name="rating" id="star4" type="radio">
                                        <label for="star4"></label>
                                        <input value="3" name="rating" id="star3" type="radio">
                                        <label for="star3"></label>
                                        <input value="2" name="rating" id="star2" type="radio">
                                        <label for="star2"></label>
                                        <input value="1" name="rating" id="star1" type="radio">
                                        <label for="star1"></label>
                                    </div> -->
                                    <div class="rating">
                                        <input value="5" name="rating" id="star5" type="radio">
                                        <label title="text" for="star5"></label>
                                        <input value="4" name="rating" id="star4" type="radio">
                                        <label title="text" for="star4"></label>
                                        <input value="3" name="rating" id="star3" type="radio">
                                        <label title="text" for="star3"></label>
                                        <input value="2" name="rating" id="star2" type="radio">
                                        <label title="text" for="star2"></label>
                                        <input value="1" name="rating" id="star1" type="radio">
                                        <label title="text" for="star1"></label>
                                    </div>
                                    <!-- <div class="wave-group">
                                        <input required="" type="text" class="input" name="comment">
                                        <span class="bar"></span>
                                        <label class="label">
                                            <span class="label-char" style="--index: 0">Bình luận</span>
                                        </label>
                                    </div> -->
                                    <div class="input-container2">
                                        <input type="text" id="input" name="comment">
                                        <label for="input" class="label">Bình luận:</label>
                                        <div class="underline"></div>
                                    </div>
                                    <div class="input-container2">
                                        <div class="row">
                                            <div class="col-9"><input type="text" class="input" name="product_id" hidden value="{{ $product->id }}"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <!-- <button class="cssbuttons-io-button" type="submit">
                                                    Bình luận
                                                    <div class="icon">
                                                        <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
                                                        </svg>
                                                    </div>
                                                </button> -->
                                                <p>
                                                    <button type="submit" class="btn btn-primary ">Bình luận</button>
                                                </p>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- <button type="submit">
                                        <p>Subscribe</p>
                                        <svg stroke-width="4" stroke="currentColor" viewBox="0 0 24 24" fill="none" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linejoin="round" stroke-linecap="round"></path>
                                        </svg>
                                    </button> -->
                                </div>
                            </div>
                        </form>
                        </d.iv>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="ftco-section">
    <div class="container12">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <!-- <span class="subheading">Gợi Ý Dành Riêng Cho Bạn</span> -->
                <h2>Sản Phẩm Tương Tự</h2>
            </div>
        </div>
        <div class="row ">
            @foreach($pdcate as $product)
            <div class="col-md-2 d-flex ">
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
                        <!-- <span class="sale">Sale</span> -->
                        <span class="category">{{$product->category->name}}</span>
                        <h2>{{ Illuminate\Support\Str::limit($product->name, 25)}}</h2>
                        <p class="mb-0 "><span class="price">{{number_format($product->price,0, ',','.')}}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script type="text/javascript">
    const btnDec = document.querySelector('#decQty')
    const btnInc = document.querySelector('#incQty')
    const intQty = document.querySelector('#quantity')

    btnDec.addEventListener('click', () => {
        if (parseInt(intQty.value) > 1) {
            intQty.value = parseInt(intQty.value) - 1;
        }
    });

    btnInc.addEventListener('click', () => {
        intQty.value = parseInt(intQty.value) + 1;
    });

    const incQty = () => {
        intQty.value = parseInt(intQty.value) + 1;
    }
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        var productDescription = $('#productDescription');
        var readMoreBtn = $('#readMoreBtn');

        if (productDescription.text().length > 200) {
            var truncatedText = productDescription.text().substring(0, 200);
            productDescription.data('fullText', productDescription.text());

            console.log(truncatedText)
            // Hiển thị mô tả giới hạn ban đầu
            productDescription.text(truncatedText);

            // Khi nhấn vào nút "Xem thêm", hiển thị mô tả đầy đủ
            readMoreBtn.click(function() {
                productDescription.text(productDescription.data('fullText'));
                readMoreBtn.hide();
            });
        } else {
            readMoreBtn.hide();
        }
    });
</script>

<script>
    function reloadPage() {
        //replace class in  a tag
    }
    $(document).ready(function() {
        $.ajax({
            url: '/user/update-wish-list',
            type: 'GET',
            success: function(data) {
                setTimeout(reloadPage, 5000)
            },
            error: function(xhr, status, error) {
                console.log(xhr);
            }
        });
    });
</script>

@endsection