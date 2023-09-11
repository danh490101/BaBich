<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ba Bich</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{asset('https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">

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
            <a class="navbar-brand" href="index.html">BABICH <span>Comestics</span></a>
            <div class="order-lg-last btn-group">
                <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="flaticon-shopping-bag"></span>
                    <div class="d-flex justify-content-center align-items-center"><small>3</small></div>
                </a>
                <!-- <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-item d-flex align-items-start" href="#">
                        <div class="img" style="background-image: url(asset/images/prod-1.jpg);"></div>
                        <div class="text pl-3">
                            <h4>Bacardi 151</h4>
                            <p class="mb-0"><a href="#" class="price">$25.99</a><span class="quantity ml-3">Quantity: 01</span></p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex align-items-start" href="#">
                        <div class="img" style="background-image: url(asset/images/prod-2.jpg);"></div>
                        <div class="text pl-3">
                            <h4>Jim Beam Kentucky Straight</h4>
                            <p class="mb-0"><a href="#" class="price">$30.89</a><span class="quantity ml-3">Quantity: 02</span></p>
                        </div>
                    </div>
                    <div class="dropdown-item d-flex align-items-start" href="#">
                        <div class="img" style="background-image: url(asset/images/prod-3.jpg);"></div>
                        <div class="text pl-3">
                            <h4>Citadelle</h4>
                            <p class="mb-0"><a href="#" class="price">$22.50</a><span class="quantity ml-3">Quantity: 01</span></p>
                        </div>
                    </div>
                    <a class="dropdown-item text-center btn-link d-block w-100" href="cart.html">
                        View All
                        <span class="ion-ios-arrow-round-forward"></span>
                    </a>
                </div> -->
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{route('shop')}}">Products</a>
                            <a class="dropdown-item" href="{{route('shop')}}">Products</a>
                            <a class="dropdown-item" href="{{route('shop')}}">Products</a>
                            <!-- <a class="dropdown-item" href="product-single.html">Single Product</a>
                            <a class="dropdown-item" href="cart.html">Cart</a>
                            <a class="dropdown-item" href="checkout.html">Checkout</a> -->
                        </div>
                    </li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                    @auth
                    <!-- <li class="nav-item" class="text-white"><a href="#" class="nav-link">{{ Auth::user()->name}}</a> /
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">LOGOUT</a>
                        </form>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <a class="dropdown-item" href="{{route('shop')}}">Thông tin</a>
                            <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span>Đăng xuất</span>
                            </form>
                        </div>
                    </li>
                    @else
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <a class="dropdown-item" href="{{route('login')}}">Login</a>
                            <a class="dropdown-item" href="{{route('register')}}">Register</a>
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>