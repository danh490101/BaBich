@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Phiếu nhập kho</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-11">
                            <h3 class="mb-0">Thông tin </h3>
                        </div>
                        <div class="col-1">
                            <span class="ni ni-bell-55" data-toggle="tooltip" data-placement="left" title="Mã phiếu nhập sẽ được tạo tự động"></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">

                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="{{ route('admin.warehouse-receipt.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Nhà cung cấp</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                            <select class="form-control form-select mt-3" name='supplier_id'>
                                                @foreach($suppliers as $supllier)
                                                <option value="{{$supllier->id}}">{{$supllier->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="product_id">Sản phẩm</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                            <select class="form-control form-select mt-3" name='product_id'>
                                                @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Số lượng</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>

                                            <input type="number" name="quantity" class="form-control" placeholder="Số lượng sản phẩm" value="">

                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="price">Giá</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>

                                            <input type="text" name="price" class="form-control" placeholder="Giá sản phẩm" value="">

                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <a href="hang-hoa.php" class="btn btn-sm btn-outline-primary">Quay lại</a>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-sm btn-primary"> Thêm hàng hóa </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection