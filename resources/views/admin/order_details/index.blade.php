@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Đơn đặt hàng đã xử lý</h6>
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
                                <th scope="col" class="sort" data-sort="name">Mã đơn hàng</th>
                                <th scope="col" class="sort" data-sort="status">Mã khách hàng</th>
                                <th scope="col" class="sort" data-sort="status">Tổng tiền</th>
                                <th scope="col" class="sort" data-sort="status">Ngày đặt hàng</th>
                                <th scope="col" class="sort" data-sort="status">Ngày giao hàng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($orders as $order)
                            @if($order->status == 1)
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <a href="#" class="media-body">
                                            <span class="name mb-0 text-sm">{{$order->id}}</span>
                                        </a>
                                    </div>
                                </th>
                                <td>
                                    <span class="name">{{$order->user_id}}</span>
                                </td>
                                <td>
                                    <span class="status">{{$order->totalamount}}</span>
                                </td>
                                <td>
                                    <span class="status">{{$order -> created_at->format('d-m-Y')}}</span>
                                </td>
                                <td>
                                    <span class="status">{{$order -> delivery_date}}</span>
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

                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection