<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba Bich</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Thêm CKEditor CSS -->
    <link rel="stylesheet" href="{{asset('asset/ckeditor/contents.css')}}">
    <!-- Thêm CKFinder CSS -->
    <link rel="stylesheet" href="{{asset('asset/ckfinder/ckfinder.css')}}">
    <link rel="stylesheet" href="{{asset('asset/ckeditor/contents.css')}}">

    <script src="{{asset('asset/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('asset/ckfinder/ckfinder.js')}}"></script>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" > -->
    <!-- <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/sweetalert2@11')}}"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    @include('partials.messenger')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand mr-5" href="{{route('index')}}">BA <span>BICH</span></a>
            <div class="order-lg-last btn-group">
                <a href="{{ route('user.cart') }}" class="btn-cart dropdown-toggle dropdown-toggle-split">
                    <span class="flaticon-shopping-bag"></span>
                    <div class="d-flex justify-content-center align-items-center">
                        <small>
                            @if (! $cart = session('cart'))
                            0
                            @else
                            {{ $cart['totalAmount'] }}
                            @endif
                        </small>
                    </div>
                </a>
                <a href="{{ route('user.view-histories') }}" class="btn-cart dropdown-toggle dropdown-toggle-split ml-3">
                    <span class="text-center">
                        <svg height="24" width="24" version="1.1" viewBox="0 0 20 21" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g fill="none" fill-rule="evenodd" id="Page-1" stroke="none" stroke-width="1">
                                <g fill="#b7472a" id="Core" opacity="0.9" transform="translate(-464.000000, -254.000000)">
                                    <g id="history" transform="translate(464.000000, 254.500000)">
                                        <path d="M10.5,0 C7,0 3.9,1.9 2.3,4.8 L0,2.5 L0,9 L6.5,9 L3.7,6.2 C5,3.7 7.5,2 10.5,2 C14.6,2 18,5.4 18,9.5 C18,13.6 14.6,17 10.5,17 C7.2,17 4.5,14.9 3.4,12 L1.3,12 C2.4,16 6.1,19 10.5,19 C15.8,19 20,14.7 20,9.5 C20,4.3 15.7,0 10.5,0 L10.5,0 Z M9,5 L9,10.1 L13.7,12.9 L14.5,11.6 L10.5,9.2 L10.5,5 L9,5 L9,5 Z" id="Shape" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="mr-5">
                <form action="{{route('user.search')}}" method="POST">
                    @csrf
                    <div class="InputContainer">
                        <input placeholder="Tìm kiếm.." id="input" class="input" name="keyword" type="text">
                    </div>
                </form>
            </div>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Phân loại</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <div class="col-sm-12  d-flex flex-wrap">
                                @foreach($categories as $category)
                                <div class="col-sm-3">
                                    <a class="dropdown-item" href="{{ route('user.shop', ['categoryId' => $category->id]) }}">{{$category->name}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thương hiệu</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <div class="col-sm-12  d-flex flex-wrap">
                                @foreach($brands as $brand)
                                <div class="col-sm-3">
                                    <a class="dropdown-item" href="{{ route('user.shop', ['brandId' => $brand->id]) }}">{{$brand->name}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loại da</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <div class="col-sm-12  d-flex flex-wrap">
                                @foreach($skins as $skin)
                                <div class="col-sm-6">
                                    <a class="dropdown-item" href="{{ route('user.shop', ['skinId' => $skin->id]) }}">{{$skin->name}}</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ route('user.about')}}" class="nav-link">Thông tin</a></li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
                        <div class="dropdown-menu w-75" aria-labelledby="dropdown04">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('user.user-profile.edit', ['user_profile' => Auth::id()]) }}">Thông tin</a>
                                <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span>Đăng xuất</span>
                                </a>
                                <a class="dropdown-item" href="{{route('user.favorites')}}">Yêu thích</a>
                                <a class="dropdown-item" href="{{route('user.order-history',['status' => '0'])}}">Lịch sử mua hàng</a>
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                        <div class="dropdown-menu w-75" aria-labelledby="dropdown04">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <a class="dropdown-item" href="{{route('login')}}">Đăng nhập</a>
                                <a class="dropdown-item" href="{{route('register')}}">Đăng ký</a>
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>