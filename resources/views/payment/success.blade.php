@extends('layouts.app')
@section('content')
<div class="container">
    <div class="text-center pt-5 pb-5 mt-5">
        <h1><span class="text-danger">{{ $message }}</span></h1>
        <h2>Cảm ơn bạn đã tin tưởng và mua hàng</h2>
    </div>
    <div class="bg-light px-4 py-3">
        <div class="row align-items-center text-center">
            <div class="col-md col-sm col-6 mb-3 mb-md-0 text-center">
                <a class="btn btn-link p-0 text-dark btn-sm" href="{{route('index')}}"><i class="fas fa-long-arrow-alt-left mr-2"> </i>Quay lại trang chủ mua sắm tiếp tục</a>
            </div>

        </div>
    </div>
</div>
@endsection