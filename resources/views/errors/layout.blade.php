<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>


    <link rel="shortcut icon" href="{{ asset('assets/compiled/svg/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('storage/logo/logo.jpg')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/error.css')}}">
</head>

<body>
<script src="{{ asset('assets/static/js/initTheme.js')}}"></script>
<div id="error">


    <div class="error-page container">
        <div class="col-md-8 col-12 offset-md-2">
            <div class="text-center">
                <img class="img-error" src="{{ asset('assets/compiled/svg/error-403.svg')}}" alt="Not Found">
                <h1 class="error-title">@yield('message')</h1>
{{--                <p class="fs-5 text-gray-600">You are unauthorized to see this page.</p>--}}
                <a href="{{ route('dashboard') }}" class="btn btn-lg btn-outline-primary mt-3">Ke Beranda</a>
            </div>
        </div>
    </div>


</div>
</body>

</html>
