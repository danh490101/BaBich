@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Chỉnh sửa</h6>
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
                            <span class="ni ni-bell-55" data-toggle="tooltip" data-placement="left" title="Mã sản phẩm sẽ được tạo tự động"></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">

                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form action="{{ route('admin.brands.update', ['brand' => $brand]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="name">Tên loại hàng</label>
                                            <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="{{$brand->name}}">
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Ảnh minh họa</label>
                                        <span style="display: block;">
                                            <img src="{{ asset($brand->image) }}" width="70px" height="auto" />
                                        </span>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <div class="custom-file">
                                            <input type="file" class=" form-control" name="fileUpload" value="{{$brand->image}}">
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