<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba Bich</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand mr-5" href="{{route('index')}}">BA <span>BICH</span></a>
            <div class="order-lg-last btn-group">
                <a href="{{route('user.cart')}}" class="btn-cart dropdown-toggle dropdown-toggle-split">
                    <span class="flaticon-shopping-bag"></span>
                    <div class="d-flex justify-content-center align-items-center"><small>
                            @if ( $cart = session('cart') )
                            {{ $cart['totalAmount'] }}
                            @else {{0}}
                            @endif
                        </small></div>
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
                    <!-- <li class="nav-item active"><a href="{{route('index')}}" class="nav-link">Trang chủ</a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('user.shop', ['categoryId' => $category->id]) }}">{{$category->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thương hiệu</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            @foreach($brands as $brand)
                            <a class="dropdown-item" href="{{ route('user.shop', ['brandId' => $brand->id]) }}">{{$brand->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loại da</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            @foreach($skins as $skin)
                            <a class="dropdown-item" href="{{ route('user.shop', ['skinId' => $skin->id]) }}">{{$skin->name}}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ route('user.about')}}" class="nav-link">Thông tin</a></li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('user.user-profile.edit', ['user_profile' => Auth::id()]) }}">Thông tin</a>
                                <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span>Đăng xuất</span>
                                </a>
                                <a class="dropdown-item" href="{{route('user.favorites')}}">Yêu thích</a>
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tài khoản</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
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