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
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle ml-3 w-100" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('ad_asset/img/khac/sticky-notes.png')}}" class="navbar-brand-img">Đơn hàng
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.orders.index')}}">
                                    <span class="nav-link-text">Đơn đặt hàng mới</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.order_details.index')}}">
                                    <span class="nav-link-text">Đơn đặt hàng đã xử lý</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle ml-3 mt-2 w-100" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('ad_asset/img/khac/toiletries.png')}}" class="navbar-brand-img">Sản phẩm
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.products.index') }}">
                                    <span class="nav-link-text">Hàng hóa</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.categories.index') }}">
                                    <span class="nav-link-text">Loại hàng</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.brands.index') }}">
                                    <span class="nav-link-text">Thương hiệu</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.suppliers.index') }}">
                                    <span class="nav-link-text">Nhà cung cấp</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.products.index') }}">
                                    <span class="nav-link-text">Nhập kho</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle ml-3 mt-2 w-100" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('ad_asset/img/khac/dry-skin.png')}}" class="navbar-brand-img">Tình trạng da
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.skins.index') }}">
                                    <span class="nav-link-text">Phân loại da</span>
                                </a>
                            </li>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button type="button" class="btn btn-secondary dropdown-toggle ml-3 mt-2 w-100" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('ad_asset/img/khac/pie-chart.png')}}" class="navbar-brand-img">Thống kê
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.statistical.index')}}">
                                    <span class="nav-link-text">Thống kê</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admin.feedback.index')}}">
                                    <span class="nav-link-text">Đánh giá</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{'admin.users.index'}}">
                                    <span class="nav-link-text">Danh sách khách hàng</span>
                                </a>
                            </li>
                        </div>
                    </div>
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
                    @auth
                    <div class="nav-item dropdown">
                        <div class="nav-link pr-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ asset('storage/' . Auth::user()->avatar) }}">
                                </span>
                                <div class="media-body  ml-2  d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">
                                        {{Auth::user()->name}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-menu  dropdown-menu-right ">

                            <a href="{{ route('admin.profile.edit', ['profile' => Auth::user()->id]) }}" class="dropdown-item">
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
                    </div>
                </div>
            </div>
        </div>
    </nav>