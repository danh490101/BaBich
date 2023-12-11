<!-- <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="address" name="address" :value="old('address')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> -->

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('asset/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/magnific-popup.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">


<div class="container" style="margin-top: 150px;">
    <div class="heading">Đăng ký</div>
    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <input required="" class="input" type="text" name="name" id="name" :value="old('name')" :messages="$errors->get('name')" placeholder="Tên khách hàng">
        <input required="" class="input" type="email" name="email" id="email" :value="old('email')" :messages="$errors->get('email')" placeholder="Email">
        <input required="" class="input" type="tel" name="phone" id="phone" :value="old('phone')" :messages="$errors->get('phone')" placeholder="Số điện thoại">
        <input required="" class="input" type="address" name="address" id="address" :value="old('address')" :messages="$errors->get('address')" placeholder="Địa chỉ">
        <div class="col-12">
            <div class="form-group">
                <!-- <input type="address" class="input" required name="province_id" :value="old('$province->id')" placeholder="Tỉnh"> -->
                <label for="province">Tỉnh</label>
                <select class="form-control" id="province-dropdown">
                    <option value="">Chọn tỉnh</option>
                    @foreach($provinces as $province)
                    <option value="  {{ $province->id }}">
                        {{ $province->name}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 row">
            <div class="col-6">
                <div class="form-group">
                    <label for="district">Quận/Huyện</label>
                    <select class="form-control" id="district-dropdown">
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="ward">Xã/Phường</label>
                    <select class="form-control" id="ward-dropdown" name="ward_id">
                    </select>
                </div>
            </div>
        </div>
        <input required="" class="input" type="password" name="password" id="password" :messages="$errors->get('password')" required autocomplete="new-password" placeholder="Mật khẩu">
        <input required="" class="input" type="password" name="password_confirmation" id="password_confirmation" :messages="$errors->get('password_confirmation')" required autocomplete="new-password" required autocomplete="new-password" placeholder="Nhập lại mật khẩu">
        <input class="login-button" type="submit" value="Đăng kí">
        <span class="forgot-password"><a href="{{route('login')}}">Đăng nhập ?</a></span>
    </form>
    <!-- <div class="social-account-container">
        <span class="title">Or Sign in with</span>
        <div class="social-accounts">
            <a href="{{ route('socialite.redirect', ['provider' => 'google']) }}" class="social-button google">
                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 488 512">
                    <path d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path>
                </svg>
            </a>
        </div>
    </div> -->
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
<style>
    .container {
        max-width: 350px;
        background: #F8F9FD;
        background: linear-gradient(0deg, rgb(255, 255, 255) 0%, rgb(244, 247, 251) 100%);
        border-radius: 40px;
        padding: 25px 35px;
        border: 5px solid rgb(255, 255, 255);
        box-shadow: #b7472a 0px 30px 30px -20px;
        margin: 20px;
        margin: 0 auto;
    }

    .heading {
        text-align: center;
        font-weight: 900;
        font-size: 30px;
        color: #b7472a;
    }

    .form {
        margin-top: 20px;
    }

    .form .input {
        width: 100%;
        background: white;
        border: none;
        padding: 15px 20px;
        border-radius: 20px;
        margin-top: 15px;
        box-shadow: #f0af9e 0px 10px 10px -5px;
        border-inline: 2px solid transparent;
    }

    .form .input::-moz-placeholder {
        color: rgb(170, 170, 170);
    }

    .form .input::placeholder {
        color: rgb(170, 170, 170);
    }

    .form .input:focus {
        outline: none;
        border-inline: 2px solid #b7472a;
    }

    .form .forgot-password {
        display: block;
        margin-top: 10px;
        margin-left: 10px;
    }

    .form .forgot-password a {
        font-size: 11px;
        color: #b7472a;
        text-decoration: none;
    }

    .form .login-button {
        display: block;
        width: 100%;
        font-weight: bold;
        background: linear-gradient(45deg, #b7472a 0%, #f0af9e 100%);
        color: white;
        padding-block: 15px;
        margin: 20px auto;
        border-radius: 20px;
        box-shadow: #f0af9e 0px 20px 10px -15px;
        border: none;
        transition: all 0.2s ease-in-out;
    }

    .form .login-button:hover {
        transform: scale(1.03);
        box-shadow: #b7472a 0px 23px 10px -20px;
    }

    .form .login-button:active {
        transform: scale(0.95);
        box-shadow: #b7472a 0px 15px 10px -10px;
    }

    .social-account-container {
        margin-top: 25px;
    }

    .social-account-container .title {
        display: block;
        text-align: center;
        font-size: 10px;
        color: rgb(170, 170, 170);
    }

    .social-account-container .social-accounts {
        width: 100%;
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 5px;
    }

    .social-account-container .social-accounts .social-button {
        background: linear-gradient(45deg, rgb(0, 0, 0) 0%, rgb(112, 112, 112) 100%);
        border: 5px solid white;
        padding: 5px;
        border-radius: 50%;
        width: 40px;
        aspect-ratio: 1;
        display: grid;
        place-content: center;
        box-shadow: #b7472a 0px 12px 10px -8px;
        transition: all 0.2s ease-in-out;
    }

    .social-account-container .social-accounts .social-button .svg {
        fill: white;
        margin: auto;
    }

    .social-account-container .social-accounts .social-button:hover {
        transform: scale(1.2);
    }

    .social-account-container .social-accounts .social-button:active {
        transform: scale(0.9);
    }

    .agreement {
        display: block;
        text-align: center;
        margin-top: 15px;
    }

    .agreement a {
        text-decoration: none;
        color: #b7472a;
        font-size: 9px;
    }
</style>