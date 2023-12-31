@extends('layouts.app')
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-3">Chi tiết đơn đặt hàng</h6>
            </div>
            <div class="col-lg-6 col-5 text-right">
            </div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-md-12">
              <div class="card card-stats">
                <div class="card-header border-1">
                    <div class="row align-items-center">
                        <div class="col">
                        <h3 class="mb-0">Thông tin đơn hàng </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Mã đơn hàng</label>
                              <span id="id" class="form-control" >{{$orderDetail->id}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Tình trạng</label>
                              <span id="id" class="form-control" >Đã xử lý</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Ngày đặt hàng</label>
                              <span class="form-control">{{$orderDetail-> created_at-> format('d-m-Y')}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Ngày gửi hàng</label>
                              <span class="form-control">{{ date('d-m-Y', strtotime($orderDetail-> delivery_date)) }}</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Mã khách hàng</label>
                              <span class="form-control" >{{$orderDetail->user_id}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="office">Tên khách hàng</label>
                              <span id="office" class="form-control" >{{$orderDetail->name}}</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Số điện thoại</label>
                              <span class="form-control" >{{$orderDetail->phone}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="office">Email</label>
                              <span id="office" class="form-control" >{{$orderDetail->email}}</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Địa chỉ </label>
                              <span class="form-control" >{{$orderDetail->address}}, {{$orderDetail->ward()->first()->name}}, ,{{ $orderDetail->ward()->first()->district()->first()->name }},{{$orderDetail->ward()->first()->district()->first()->province()->first()->name}}</span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- thong ke -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Danh sách sản phẩm </h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Mã hàng</th>
                    <th scope="col">Tên hàng</a> </th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($orderDetails as $or)
                  @if($orderDetail->id === $or->id)
                  <tr>
                    <th scope="row">
                    {{$or->product_id}}
                    </th>
                    <td>
                    <a href="#">{{ $or->product_name }}</a>
                    </td>
                    <td>
                    {{ $or->price }} 
                    </td>
                    <td>
                    {{ $or->quantity }} 
                    </td>
                    <td>
                    {{ number_format($or->price * $or->quantity) }} 
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
    <div class="container-fluid">
      <div class="card-body">
          <div class="row">
              <div class="col-6 text-left">
                  <div class="form-group">
                      <a href="{{ route('admin.order_details.index')}}" class="btn btn-sm btn-outline-primary">Quay lại</a>
                  </div>
              </div>
              <div class="col-6 text-right pr-2">
                  <h5 class="card-title text-uppercase text-muted mb-2">Thành tiền </h5>
                  <span class="h2 font-weight-bold mb-2 ">{{ number_format($orderDetail->totalamount, 0, ',', '.') }}</span>
                  <h6 class="card-title text-uppercase text-muted mb-2">Giảm giá </h6>
                  <span class="h2 font-weight-bold mb-2 ">{{ number_format($orderDetail->discountValue, 0, ',', '.') }}</span>
                  <h3 class="card-title text-uppercase text-muted mb-2">Tổng thanh toán </h3>
                  <span class="h2 font-weight-bold mb-2 ">{{ number_format($orderDetail->totalamount - $orderDetail->discountValue, 0, ',', '.') }}</span>
              </div>
              </div>
          </div>
      </div>
    </div>
@endsection