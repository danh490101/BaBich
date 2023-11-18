@extends('layouts.app')
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px;  background-size: cover; background-position: center top;">
    <span class="mask bg-primary opacity-8"></span>
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="display-3 text-white"></h1>
            </div>
        </div>
    </div>
</div>
<div class="container mt--6">
    <div class="row justify-content-center">
        <div class="col-xl-9 order-xl-1">
            <div class="card">
                <form action="{{ route ('user.user-profile.update', ['user_profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Thông tin liên hệ </h3>
                            </div>
                            <div class="col-4 text-right">
                                <input type="submit" name="save" class="btn btn-sm btn-primary" value="Lưu thay đổi">
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-5">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div class="card-profile-image mt-3">
                                    <a href="#">
                                        <img src="{{ asset($user->avatar) }}" class="rounded-circle" style="margin-top:45px; height: 200px; width:300px">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center">
                                <h3 class="h1 mb-5 font-italic text-uppercase">
                                    {{$user->name}}<span class="font-weight-light "></span>
                                </h3>
                                <div class="custom-file">
                                    <input type="file" class=" form-control" name="fileUpload" value="Cập nhật ảnh đại diện!">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="id">Mã khách hàng</label>
                                            <span name="id" class="form-control">{{$user->id}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="phone">Số điện thoại</label>
                                            <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Địa chỉ cụ thể (số nhà, đường)</label>
                                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value=" @if(Auth()->user()->ward_id != NULL){{$user->address}} @endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="province">Tỉnh</label>
                                                <select class="form-control" id="province-dropdown">
                                                    <option value="">Chọn tỉnh</option>
                                                    @if(Auth()->user()->ward_id != NULL)
                                                    <option value="{{ Auth()->user()->ward()->first()->district()->first()->province()->first()->id }}" selected>
                                                        {{ Auth()->user()->ward()->first()->district()->first()->province()->first()->name }}
                                                    </option>
                                                    @else
                                                    @foreach($provinces as $province)
                                                    <option value="  {{ $province->id }}">
                                                        {{ $province->name}}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
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

@endsection

