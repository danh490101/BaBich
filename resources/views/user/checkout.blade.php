@extends('layouts.app')
@section('content')
<div>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Thanh toán <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">Thanh Toán</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 ftco-animate">
                    <form action="{{ route('user.checkout.store') }}" method="post" class="billing-form">
                        @csrf
                        <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Tên khách hàng</label>
                                    <input id="name" type="text" name="name" class="form-control" placeholder="" value="{{ old('name') ?? $user->name }}">
                                    @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="" value="{{ old('address') ?? $user->address }}">
                                    @error('address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="" value="{{ old('phone') ??  $user->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="province">Tỉnh</label>
                                    <select class="form-control" id="province-dropdown">
                                        <option value="">Chọn tỉnh</option>
                                        @if(Auth()->user()->ward_id != NULL)
                                        <option value="{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->id }}" selected>
                                            {{ Auth()->user()->ward()->first()->district()->first()->province()->first()->name }}
                                        </option>
                                        @endif
                                            @foreach($provinces as $province)
                                            <option value="  {{ $province->id }}">
                                                {{ $province->name}}
                                            </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="{{ old('email') ??  $user->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district">Quận/Huyện</label>
                                    @if(Auth()->user()->ward_id != NULL)
                                    <select class="form-control" id="district-dropdown">
                                        <option value="  {{ Auth()->user()->ward()->first()->district()->first()->id }}">
                                            {{ Auth()->user()->ward()->first()->district()->first()->name }}
                                        </option>
                                    </select>
                                    @else
                                    <select class="form-control" id="district-dropdown">
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ward">Xã/Phường</label>
                                    @if (Auth()->user()->ward_id != null)
                                    <select class="form-control" id="ward-dropdown" name="ward_id">
                                        <option value="{{ Auth()->user()->ward_id }}">
                                            {{ Auth()->user()->ward->name }}
                                        </option>
                                    </select>
                                    @else
                                    <select class="form-control" id="ward-dropdown" name="ward_id">
                                    </select>
                                    @endif
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="w-100"></div>
                        </div>
                        <div class="row mt-5 pt-3 d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">TỔNG</h3>
                                    <p class="d-flex">
                                        <span>Tổng đơn hàng</span>
                                        <span>{{ number_format($cart['totalPrice']) }}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Phí vận chuyển</span>
                                        <span id="delivery-fee-span">
                                            @if(Auth()->user()->ward_id != NULL)
                                            <input id="delivery-fee" type="hidden" name="delivery_cost" class="form-control" placeholder="" value="{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->deliveryfee()->first()->price }}">
                                            {{ Auth()->user()->ward()->first()->district()->first()->province()->first()->deliveryfee()->first()->price }}
                                            @else
                                            <input id="delivery-fee" type="hidden" name="delivery_cost" class="form-control" placeholder="" value="00">
                                            @endif
                                        </span>
                                    </p>
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="discount">Nhập mã giảm giá</label>
                                                <input type="text" id="discountCode" name="code" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <p class="d-flex">
                                        <span>Discount</span>
                                        <span>00</span>
                                    </p> -->
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Tổng</span>
                                        <input type="hidden" id="cartTotal" value="{{ round( $cart['totalPrice']) }}">
                                        <input type="hidden" name="totalamount" id="total_order_input" class="form-control" placeholder="" value="{{ round( $cart['totalPrice'] + Auth()->user()->ward()->first()->district()->first()->province()->first()->deliveryfee()->first()->price) }}">
                                        <span id="total_order_span"> @if(Auth()->user()->ward_id != NULL)
                                            {{ number_format( $cart['totalPrice'] + Auth()->user()->ward()->first()->district()->first()->province()->first()->deliveryfee()->first()->price) }}
                                            @else
                                            {{ number_format( $cart['totalPrice']) }}
                                            @endif</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input name="payment_method" value="COD" type="radio" name="optradio" class="mr-2">Thanh toán nhận hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input name="payment_method" value="VNPAY" type="radio" name="optradio" class="mr-2"> VNPay</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" class="mr-2" required> Đã kiểm tra và đồng ý</label>
                                            </div>
                                        </div>
                                    </div>

                                    @error('payment_method')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror

                                    <button type="submit" id="orderButton" class="btn btn-primary py-3 px-4">
                                        <span class="btn-txt">Đặt hàng</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#searchDiscount').click(function() {
            var discountCode = $('#discountCode').val();
            $.ajax({
                url: '/api/find-discount/' + discountCode,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    let total = $('#total_order_input').val() - ($('#total_order_input').val() * data.value / 100)
                    console.log(total);
                    $('#total_order_input').val(total);
                    $('#total_order_span').text(total);
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                }
            });
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript">
</script>
<script>
    $(document).ready(function() {
        $('#province-dropdown').on('change', function() {
            var province_id = this.value;

            $.ajax({
                url: '/user/delivery-fee/' + province_id,
                type: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#delivery-fee').val(data);
                    $('#delivery-fee-span').text(data);
                    let total = BigInt($('#total_order_input').val()) + BigInt(data);
                    $('#total_order_input').val(total);
                    $('#total_order_span').text(total);
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                }
            });

            $("#district-dropdown").html('');
            $.ajax({
                url: "{{ route('locations.get-district') }}",
                type: "POST",
                data: {
                    province_id: province_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#district-dropdown').html(
                        '<option value="">Chọn quận/huyện</option>'
                    );
                    $.each(result.districts, function(
                        key, value) {
                        $("#district-dropdown")
                            .append(
                                '<option value="' +
                                value
                                .id +
                                '">' + value
                                .name +
                                '</option>');
                    });
                    $('#ward-dropdown').html(
                        '<option value="">Chọn phường xã </option>'
                    );
                }
            });
        });

        $('#district-dropdown').on('change', function() {
            var district_id = this.value;
            $("#ward-dropdown").html('');
            $.ajax({
                url: "{{ route('locations.get-ward') }}",
                type: "POST",
                data: {
                    district_id: district_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    $('#ward-dropdown').html(
                        '<option value="">Chọn phường/xã</option>'
                    );
                    $.each(result.wards, function(key,
                        value) {
                        $("#ward-dropdown")
                            .append(
                                '<option value="' +
                                value.id +
                                '">' + value
                                .name +
                                '</option>');
                    });
                }
            });
        });

    });
</script>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>

<script>
    $(document).ready(function () {
            $('#discountCode').on('input', function () {
                $.ajax({
                    url: '/user/check-coupon',
                    type: 'GET',
                    data: { code: this.value },
                    dataType: 'json',
                    success: function (response) {
                        let value =  $('#cartTotal').val()
                        let fee =  $('#delivery-fee').val()
                        let total = parseInt(value) + parseInt(fee)
                        let newTotal = parseInt(total) - (parseInt(total) * response.data.value)/100 
                        $('#total_order_input').val(newTotal);
                        $('#total_order_span').text(newTotal);
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            });
        });
</script>
@endsection