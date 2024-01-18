<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>



    <link rel="shortcut icon" href="{{ asset('storage/logo/logo.jpg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('storage/logo/logo.jpg')}}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/iconly.css')}}">

    {{-- Datatables  --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/compiled/css/app-dark.css')}}">

    {{--  SweetAlert  --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.css')}}">
    {{-- Select Option   --}}
    <link rel="stylesheet" href="{{ asset('assets/extensions/choices.js/public/assets/styles/choices.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/extensions/flatpickr/flatpickr.min.css')}}">
</head>

<body>
<script src="{{ asset('assets/static/js/initTheme.js')}}"></script>
<div id="app">
    @include('partials.sidebar')
    <div id="main" class='layout-navbar navbar-fixed'>
        @include('partials.header')
        <div id="main-content">
            @yield('content')

        </div>
        @include('partials.footer')
    </div>
</div>
<script src="{{ asset('assets/static/js/components/dark.js')}}"></script>
<script src="{{ asset('assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>


<script src="{{ asset('assets/compiled/js/app.js')}}"></script>
<!-- Need: Apexcharts -->
<script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{ asset('assets/static/js/pages/dashboard.js')}}"></script>

{{-- Datatables --}}
<script src="{{ asset('assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('assets/static/js/pages/datatables.js')}}"></script>
@stack('scripts')

{{-- SweetAlert --}}
<script src="{{ asset('assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>>
{{--<script src="{{ asset('assets/static/js/pages/sweetalert2.js')}}"></script>>--}}
{{-- Select Option --}}
<script src="{{ asset('assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
<script src="{{ asset('assets/static/js/pages/form-element-select.js')}}"></script>

<script src="{{ asset('assets/extensions/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/static/js/pages/date-picker.js')}}"></script>

<script>
    // If you want to use tooltips in your project, we suggest initializing them globally
    // instead of a "per-page" level.
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }, false);
</script>
</body>

</html>
