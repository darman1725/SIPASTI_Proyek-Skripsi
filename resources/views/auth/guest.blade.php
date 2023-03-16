<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ Vite::asset('resources/images/logo/favicon.png') }}" type="image/png">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/css/auth.css'])

</head>

<body>
    <div id="auth">
        {{ $slot }}
    </div>
</body>

</html>
