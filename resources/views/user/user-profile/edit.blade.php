@extends('layouts.app')
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px;  background-size: cover; background-position: center top;">
    <span class="mask bg-primary opacity-8"></span>
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="display-3 text-white"></h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt--6">
    <div class="row justify-content-center">
        <div class="col-xl-9 order-xl-1">
            <div class="card">
                <form action="{{ route ('user.user-profile.update', ['user_profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="card-body mt-5">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="card-profile-image mt-3">
                                    <a href="#">
                                        <img src="{{ asset($user->avatar) }}" class="rounded-circle"  style="margin-top:45px; height: 200px;">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <h3 class="h1 mb-5 font-italic text-uppercase">
                                    {{$user->name}}<span class="font-weight-light "></span>
                                </h3>
                                <div class="custom-file">
                                    <input type="file" class=" form-control" name="fileUpload" value="Cập nhật ảnh đại diện!">
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