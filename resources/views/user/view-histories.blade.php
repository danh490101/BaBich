@extends('layouts.app')
@section('content')
<div>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0">
                        <span class="mr-2"><a href="{{ route('index') }}">Trang chủ <i class="fa fa-chevron-right"></i></a></span>
                        <span>Lịch sử xem <i class="fa fa-chevron-right"></i></span>
                    </p>

                    <h2 class="mb-0 bread">Lịch Sử Xem</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4">
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-primary">
                    <tr>
                        <th>STT</th>
                        <th>Hình Ảnh</th>
                        <th>Sản Phẩm</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price, 0) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection