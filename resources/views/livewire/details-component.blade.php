@extends('layouts.app')
@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span><a href="product.html">Products <i class="fa fa-chevron-right"></i></a></span> <span>Products Single <i class="fa fa-chevron-right"></i></span></p>
                <h2 class="mb-0 bread">Chi tiết sản phẩm</h2>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a class="image-popup prod-img-bg"><img src="{{asset('storage/'.$product->image)}} " width="550px" height="auto" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate mt-5">
                <h3>{{$product->name}}</h3>
                <p class="price"><span>Giá: {{$product->price}}</span></p>
                <div class="row mt-4">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                <i class="fa fa-minus"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="fa fa-plus"></i>
                            </button>
                        </span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;">Số lượng: {{$product ->quantity}}</p>
                    </div>
                </div>
                <p><a href="cart.html" class="btn btn-primary py-3 px-5 mr-2">Add to Cart</a></p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Mô Tả</a>
                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Đánh Giá</a>

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
                        <div class="wave-group">
                            <input required="" type="text" class="input" name="comment">
                            <span class="bar"></span>
                            <label class="label">
                                <span class="label-char" style="--index: 0">Bình luận</span>
                                <!-- <span class="label-char" style="--index: 1">a</span>
                            <span class="label-char" style="--index: 2">m</span>
                            <span class="label-char" style="--index: 3">e</span> -->
                            </label>
                        </div>
                        <div class="wave-group">
                            <input type="text" class="input" name="product_id" hidden value="{{ $product->id }}">
                        </div>
                        <button class="button type1" type="submit">
                            <span class="btn-txt">Gửi</span>
                        </button>
                    </div>
                </div>
            </form>
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
                                <h3 class="mb-4">3 Đánh giá</h3>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Khánh Băng</span>
                                            <span class="text-right">25 09 2023</span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>Sản phẩm tốt, sẽ mua lại nhiều lần</p>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Phương Hảo</span>
                                            <span class="text-right">25 08 2023</span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p>Đã check real nha mọi người ơi, nên mua. Săn sale được giá quá hời luôn é </p>
                                    </div>
                                </div>
                                <div class="review">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left">Minh Tùng</span>
                                            <span class="text-right">03 08 2023</span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                        </p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="rating-wrap">
                                    <h3 class="mb-4">Give a Review</h3>
                                    <p class="star">
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>

                                        </span>
                                        <span>2 Reviews</span>
                                    </p>
                                    <p class="star">
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>

                                        </span>
                                        <span>1 Reviews</span>
                                    </p>
                                    <p class="star">
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>

                                        </span>
                                        <span>0 Reviews</span>
                                    </p>
                                    <p class="star">
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>

                                        </span>
                                        <span>0 Reviews</span>
                                    </p>
                                    <p class="star">
                                        <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>

                                        </span>
                                        <span>0 Reviews</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection