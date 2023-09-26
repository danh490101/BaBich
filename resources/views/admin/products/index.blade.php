@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Hàng hóa</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="{{ route('admin.products.create')}}" role="button">
                            <div class="media align-items-center">
                                <span class="btn btn-sm btn-neutral">
                                    <i class="ni ni-fat-add text-blue"></i>
                                    <span> Thêm hàng</span>
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
                                <th scope="col" class="sort" data-sort="name">Mã hàng</th>
                                <th scope="col" class="sort" data-sort="name">Tên hàng</th>
                                <th scope="col" class="sort" data-sort="name">Giá</th>
                                <th scope="col" class="sort" data-sort="name">Trạng thái</th>
                                <th scope="col" class="sort" data-sort="name">Số lượng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$product->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{$product->name}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$product->price}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$product->stock_status}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$product->quantity}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('admin.products.edit', ['product' => $product]) }}">Xem & chỉnh sửa</a>
                                            <a class="dropdown-item" href="{{ route('admin.products.destroy', ['product' => $product]) }}" onclick="alertFunction()">Xóa</a>
                                            <form id="delete-form-{{ $product->id }}" action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <script>
                                                function alertFunction() {
                                                    event.preventDefault();
                                                    if (confirm("Are you sure to delete")) {
                                                        document.getElementById('delete-form-{{ $product->id }}').submit();
                                                    }
                                                }
                                            </script>
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