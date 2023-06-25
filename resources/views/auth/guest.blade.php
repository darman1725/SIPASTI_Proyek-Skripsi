<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.png') }}" type="image/png"> --}}
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- @vite(['resources/css/app.css', 'resources/css/auth.css']) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</head>

<body>
    <div id="auth">
        {{ $slot }}
    </div>
</body>

</html>
