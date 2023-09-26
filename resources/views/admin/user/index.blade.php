@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Danh sách khách hàng có tài khoản</h6>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Mã khách hàng</th>
                                <th scope="col" class="sort" data-sort="status">Tên khách hàng</th>
                                <th scope="col" class="sort" data-sort="status">Email</th>
                                <th scope="col" class="sort" data-sort="status">Số điện thoại</th>
                                <th scope="col" class="sort" data-sort="status">Địa chỉ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                                <tr>
                                @foreach($users as $user)
                                    <th scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="media-body">
                                                <span class="name mb-0 text-sm">{{$user->id}}</span>
                                            </a>
                                        </div>
                                    </th>
                                    <td>
                                        <span class="name">{{$user->name}}</span>
                                    </td>
                                    <td>
                                        <span class="status">{{$user->emmail}}</span>
                                    </td>
                                    <td>
                                        <span class="status"></span>
                                    </td>
                                    <td>
                                        <span class="status"></span>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="dropdown-item" href="#" onclick="">Xóa</a>
                                        </div>
                                    </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection