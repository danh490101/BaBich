<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>BABICH</title>
    <link rel="icon" href="{{asset('img/khac/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}">
    <link rel="stylesheet" href="{{asset('ad_asset/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ad_asset/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ad_asset/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css')}}">
</head>

<body>
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="index.php">
                    <img src="{{asset('ad_asset/img/khac/logo.jpg')}}" class="navbar-brand-img" alt="brand image">
                </a>
            </div>
            <div class="navbar-inner">
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">

                                <span class="nav-link-text">Đơn đặt hàng mới</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="don-dat-hang.php">

                                <span class="nav-link-text">Đơn đặt hàng đã xử lý</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('admin.products')}}">
                                <span class="nav-link-text">Hàng hóa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.categories')}}">
                                <span class="nav-link-text">Loại hàng</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="thong-ke.php">
                                <span class="nav-link-text">Thống kê</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="khachhang.php">
                                <span class="nav-link-text">Danh sách khách hàng</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </nav>
    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav align-items-left d-xl-none ml-0  ">
                        <a href="index.php">
                            <img src="ad_asset/img/khac/brand.png" class="navbar-brand-img" alt="brand image" width="110px">
                        </a>
                    </div>

                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <!-- Tai khoan-->
                    <div class="navbar-nav align-items-center  ml-auto ml-md-0 ">

                        <div class="nav-item dropdown">
                            <div class="nav-link pr-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{asset('ad_asset/img/khac/avatar.png')}}">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            <?php //echo $_SESSION['tennv']; 
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                @auth
                                <a href="profile.php" class="dropdown-item">
                                    <span>{{ Auth::user()->name}}</span>
                                </a>
                                <form method="POST" action="{{route('logout')}}">
                                    @csrf
                                    <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                        <span>Đăng xuất</span>
                                    </a>
                                </form>
                                @endif
                            </div>
                            <!-- @auth
                    <li class="nav-item" class="text-white"><a href="#" class="nav-link">{{ Auth::user()->name}}</a> /
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">LOGOUT</a>
                        </form>
                    </li>
                    @else
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link">LOGIN</a>
                        / <a href="{{route('register')}}">SIGN UP</a>
                    </li>
                    @endif -->
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Header -->