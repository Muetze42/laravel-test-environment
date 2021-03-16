<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="bg-secondary bg-gradient" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}?t={{ filemtime('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-transparent">
@if (Route::currentRouteName())
    <nav class="navbar fixed-top navbar-light bg-secondary">
        <div class="container-fluid">
            <a href="/" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" class="mb-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span class="h5">
                    Home
                </span>
            </a>
        </div>
    </nav>
    <div class="my-4 py-4"></div>
@endif
@yield('content')
<script src="{{ asset('js/app.js') }}?t={{ filemtime('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.is-datatable').DataTable();
    } );
</script>
</body>
</html>
