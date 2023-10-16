@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Thống Kê</h6>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row text-center">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Tổng doanh thu tính tới hiện tại: </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberStatis}}.000 VNĐ</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số lượng đơn hàng:
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$numberOrder}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số lượng người khách hàng: </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberUser}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<br>
<br>
<br>
<form action="{{ route('admin.statistical.search') }}" method="POST">
    @csrf
<div class="container-fluid mt--6">
    <div class="row m-3">
        <div class="float-left">
            <button type="submit" class="btn btn-sm btn-primary"> Tìm kiếm </button>
            <!-- <input type="button" placeholder="Tìm kiếm" class="input"> -->
        </div>
    </div>
    <!-- <div class="card-body bg-white">
        <div class="row">
            <label class="form-control-label" for="id">Ngày</label>
            <input class="form-control" type="date" name="ngaygh" value="" placeholder="VD: 2022-11-01">
        </div>
    </div> -->

    <div class="card-body bg-white">
        <div class="row m-3">
            <div class="col">
                <label class="form-control-label" for="optionDatetimeType">Option:</label>
                <div class="col-sm-9">
                    <select class="form-control" id="optionDatetimeType" name="optionDatetimeType">
                        <option value="day">Ngày</option>
                        <option value="month">Tháng</option>
                        <option value="year">Năm</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label class="form-control-label" for="date">Ngày - Tháng - Năm</label>
                <input class="form-control" type="date" name="optionDatetime" id="date" 
                value="" placeholder="VD: 2023-11-01">
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Mã đơn hàng</th>
                                <th scope="col" class="sort" data-sort="status">Loại Sản Phẩm</th>
                                <th scope="col" class="sort" data-sort="status">Tên Sản Phẩm</th>
                                <th scope="col" class="sort" data-sort="status">Đơn Giá</th>
                                <th scope="col" class="sort" data-sort="status">Số Lượng</th>
                                <th scope="col" class="sort" data-sort="status">Thành Tiền</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @if (isset($orders))
                            @foreach ($orders as $order)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class="media-body">
                                            <span class="name mb-0 text-sm"></span>
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <span class="name"></span>
                                </td>
                                <td>
                                    <span class="status"></span>
                                </td>
                                <td>
                                    <span class="status"></span>
                                </td>
                                <td>
                                    <span class="status"></span>
                                </td>
                                <td>
                                    <span class="status"></span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="#">Xem chi tiết</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection