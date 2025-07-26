<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- The title will be set by individual views using @section('title') --}}
    <title>@yield('title', config('app.name', 'AutoPermis'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        {{--
            The content of the login (or register, or password reset) view
            will be injected here. The styling for the card, title, and form
            elements is handled within the login.blade.php itself, which makes
            this layout very flexible.
        --}}
        @yield('content')
    </div>
</body>
</html>