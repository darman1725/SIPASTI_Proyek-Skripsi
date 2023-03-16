<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.png') }}" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('style')


</head>

<body>
    <div id="app">
        @include('backend.layouts.sidebar')

        <div id="main" class='layout-navbar'>
            @include('backend.layouts.header')
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                    </div>
                    {{ $slot }}
                </div>

                @include('backend.layouts.footer')
            </div>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
