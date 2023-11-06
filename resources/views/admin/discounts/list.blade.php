@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">GIẢM GIÁ</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="{{ route('admin.discounts.new-discount-form')}}" role="button">
                            <div class="media align-items-center">
                                <span class="btn btn-sm btn-neutral">
                                    <i class="ni ni-fat-add text-blue"></i>
                                    <span> Tạo mới giảm giá</span>
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
                                <th scope="col" class="sort" data-sort="name">Mã </th>
                                <th scope="col" class="sort" data-sort="name">Tên giảm giá</th>
                                <th scope="col" class="sort" data-sort="name">Mã giảm giá</th>
                                <th scope="col" class="sort" data-sort="name">Giá trị giảm giá (%)</th>
                                <th scope="col" class="sort" data-sort="name">Thời hạn (days)</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @foreach($discounts as $discount)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$discount->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{$discount->name}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$discount->code}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$discount->value}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$discount->expire_day}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <form action="{{route('admin.discounts.destroy',['id' => $discount->id])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Xóa</button>
                                            </form>
                                            <!-- <script>
                                                function alertFunction(brand) {
                                                    console.log(brand);
                                                    event.preventDefault();
                                                    // if (confirm("Are you sure to delete")) {
                                                    // }
                                                }
                                            </script> -->
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