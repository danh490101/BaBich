@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Danh sách khách hàng</h6>
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
                                <th scope="col" class="sort" data-sort="name">Tên</th>
                                <th scope="col" class="sort" data-sort="name">Số điện thoại</th>
                                <th scope="col" class="sort" data-sort="name">Địa chỉ</th>
                                <th scope="col" class="sort" data-sort="name">Email</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($clients as $client)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$client->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{$client->name}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$client->phone}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$client->address}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$client->email}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{ route('admin.client.destroy', ['client' => $client->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Xóa</button>
                                            </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection