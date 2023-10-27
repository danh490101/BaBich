@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Nhập kho</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="/admin/suppliers/create/" role="button">
                            <div class="media align-items-center">
                                <span class="btn btn-sm btn-neutral">
                                    <i class="ni ni-fat-add text-blue"></i>
                                    <span> Thêm phiếu nhập hàng</span>
                                </span>
                            </div>
                        </a>
                    </li>
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
                                <th scope="col" class="sort" data-sort="name">Mã nhập hàng</th>
                                <th scope="col" class="sort" data-sort="name">Tên nhà cung cấp</th>
                                <th scope="col" class="sort" data-sort="name">Nhân viên xử lý</th>
                                <th scope="col" class="sort" data-sort="name">Ngày nhập</th>
                                <th scope="col" class="sort" data-sort="name">Tổng đơn</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$supplier->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{$supplier->name}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$supplier->email}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$supplier->phone}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$supplier->address}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('admin.suppliers.edit', ['supplier' => $supplier->id]) }}">Xem & chỉnh sửa</a>
                                            <form action="{{ route('admin.suppliers.destroy', ['supplier' => $supplier->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Xóa</button>
                                            </form>
                                        </div>
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