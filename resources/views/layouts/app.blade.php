<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>
<body>
    <x-navigation />

    <main class="container mx-auto mt-5">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>
