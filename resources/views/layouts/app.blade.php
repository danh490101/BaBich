<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>BABICH</title>
    <link rel="icon" href="{{asset('img/khac/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700')}}">
    <link rel="stylesheet" href="{{asset('ad_asset/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ad_asset/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('ad_asset/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireStyles

</head>

<body>
    @if(Auth::check() && Auth::user()->utype =='ADM')
    @include('partials.admin-header')

    <div class="content">
        @yield('content') <!-- Hthị phần thân -->
    </div>

    @include('partials.admin-footer')

    @else
    @include('partials.user-header')

    <div class="content">
        @yield('content') <!-- Hthị phần thân -->
    </div>

    @include('partials.user-footer')

    @endif
    @livewireScripts
    @yield('scripts')
</body>

</html>
