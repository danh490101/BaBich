@extends('layouts.app')
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px;  background-size: cover; background-position: center top;">
    <span class="mask bg-primary opacity-8"></span>
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="display-3 text-white">Xin chào</h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image " style="border-radius: 5px;">
                            <a href="#">
                                <img src="{{ asset($user->avatar) }}" class="rounded-circle">
                            </a>

                        </div>
                    </div>
                </div>
                <!-- <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class=" form-control" name="fileUpload" value="{{$user->avatar}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="card-header text-center border-0 pt-7 pt-md-4 pb-0 pb-md-6">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center">
                        <h5 class="h3">
                            {{$user->name}}<span class="font-weight-light"></span>
                        </h5>
                        <!-- <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2">Giám Đốc</i>
                            </div> -->
                        <div>
                            <i class="ni education_hat mr-2"></i>Ba Bich Comestics
                        </div>
                        <div class="custom-file">
                            <input type="file" class=" form-control" name="fileUpload" value="Cập nhật ảnh đại diện!">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <form action="{{ route ('admin.profile.update', ['profile' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Thông tin liên hệ </h3>
                            </div>
                            <div class="col-4 text-right">
                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Lưu thay đổi">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="id">Mã nhân viên</label>
                                        <span name="id" class="form-control">{{$user->id}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="phone">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$user->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{$user->address}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection