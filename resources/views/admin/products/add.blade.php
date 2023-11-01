@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Thêm hàng hóa</h6>
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
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Tên hàng</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="goods">Loại hàng</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <select class="form-control form-select mt-3" name='category_id'>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" name="id-goods" class="form-control" placeholder="Mã loại hàng" value=""> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="goods">Thương hiệu</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <select class="form-control form-select mt-3" name='brand_id'>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" name="id-goods" class="form-control" placeholder="Mã loại hàng" value=""> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="skin_id">Thuộc loại da</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <select class="form-control form-select mt-3" name='skin_id'>
                                            @foreach ($skins as $skin)
                                                <option value="{{ $skin->id }}">{{ $skin->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" name="id-goods" class="form-control" placeholder="Mã loại hàng" value=""> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <hr class="my-4" /> -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Ghi chú</label>
                                        <textarea name="desc" rows="4" class="form-control" placeholder="Mô tả chi tiết sản phẩm"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Ảnh minh họa</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <div class="custom-file">
                                            <input type="file" class=" form-control" name="fileUpload">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Ảnh minh họa</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <div class="custom-file">
                                            <input type="file" class=" form-control" name="fileUpload1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Ảnh minh họa</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <div class="custom-file">
                                            <input type="file" class=" form-control" name="fileUpload2">
                                        </div>
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