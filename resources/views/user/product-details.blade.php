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
            <div class="col-lg-6 mb-5 ftco-animate">
                <div class="slider">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('storage/' . $product->image) }}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('storage/' . $product->images) }}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('storage/' . $product->image2) }}" alt="Second slide">
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
            <div class="col-lg-6 product-details pl-md-5 ftco-animate mt-5">
                <h3>{{$product->name}}</h3>
                <p class="price"><span>Giá: {{$product->price}}</span></p>

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
                    <button type="submit" class="btn btn-primary py-3 px-5 mr-2">Add to Cart</button>
                    <!-- <form action="{{route('user.addToFavorites',['productId'=>$product->id])}}" method="post">
                    @csrf
                    <label class="container1">
                        <input type="submit" name="{{$product->id}}">
                        <svg id="Layer_1" version="1.0" viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="M16.4,4C14.6,4,13,4.9,12,6.3C11,4.9,9.4,4,7.6,4C4.5,4,2,6.5,2,9.6C2,14,12,22,12,22s10-8,10-12.4C22,6.5,19.5,4,16.4,4z"></path>
                        </svg>
                    </label>
                </form> -->
                </p>
                </form>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Mô Tả</a>
                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Đánh Giá
                    </a>
                </div>
            </div>
            <div class="col-md-12 tab-wrap">
                <div class="tab-content bg-light" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <h3 class="mb-4">{{$product->name}}</h3>
                            <p>{{$product->desc}}</p>
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
                                    <div class="rating">
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
                                        <input type="text" class="input" name="product_id" hidden value="{{ $product->id }}">
                                    </div>
                                    <button class="button type1" type="submit">
                                        <span class="btn-txt">Gửi</span>
                                    </button>
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
@endsection