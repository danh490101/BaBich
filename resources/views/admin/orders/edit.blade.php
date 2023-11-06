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
                              <span id="id" class="form-control" >{{$orders->id}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Tình trạng</label>
                              <span id="id" class="form-control" > Đang chờ xử lý</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Ngày đặt hàng</label>
                              <span class="form-control">{{$orders -> created_at->format('d-m-Y')}}</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Mã khách hàng</label>
                              <span class="form-control" >{{$orders->user_id}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="office">Tên khách hàng</label>
                              <span id="office" class="form-control" >{{$orders->name}}</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Số điện thoại</label>
                              <span class="form-control" >{{$orders->phone}}</span>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="form-group">
                              <label class="form-control-label" for="office">Email</label>
                              <span id="office" class="form-control" >{{$orders->email}}</span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-12 col-md-12">
                          <div class="form-group">
                              <label class="form-control-label" for="id">Địa chỉ </label>
                              <span class="form-control" >{{$orders->address}}</span>
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
                  @foreach($order as $or)
                  @if($orders->id === $or->id)
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
                      <a href="{{ route('admin.orders.index')}}" class="btn btn-sm btn-outline-primary">Quay lại</a>
                  </div>
              </div>
              <div class="col-6 text-right pr-2">
                  <h5 class="card-title text-uppercase text-muted mb-2">Tổng thanh toán </h5>
                  <span class="h2 font-weight-bold mb-2 ">{{$orders->totalamount}}</span>
              </div>
          </div>
      </div>
    </div>
    
    <form action="{{ route('admin.orders.update', ['order' => $orders]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="container-fluid">
        <div class="card-body bg-white">
            <div class="row">
                <label class="form-control-label" for="id">Ngày giao hàng</label>
                <input class="form-control" type="date" name="delivery_date" value="" placeholder="VD: 2023-11-01"> 
            </div>
        </div>
      </div>
      <div class="container-fluid ">
          <div class=" py-4">
              <div class="row">
                  <div class="col-6 text-left">
                      <div class="form-group">
                          <input type="submit" class="btn btn-sm btn-primary" name="xacnhan" value="Hủy đơn hàng">
                      </div>
                  </div>
                  <div class="col-6 text-right">
                      <div class="form-group">
                          <input type="submit" class="btn btn-sm btn-primary" name="xacnhan" value="Xác nhận giao hàng">
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </form>
@endsection