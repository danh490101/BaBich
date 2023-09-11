<!DOCTYPE html>
<html>

<head>
    <title>BABICH</title>
</head>

<body>
    @if(Auth::check() && Auth::user()->utype =='ADM')
    {{-- Hiển thị header và nội dung cho admin --}}
    @include('partials.admin-header')

    <div class="content">
        @yield('content') <!-- Hiển thị phần thân của từng trang -->
    </div>

    @include('partials.admin-footer')

    @else
    {{-- Hiển thị header và nội dung cho user thường --}}
    @include('partials.user-header')

    <div class="content">
        @yield('content') <!-- Hiển thị phần thân của từng trang -->
    </div>

    @include('partials.user-footer')

    @endif
    
</body>

</html>
