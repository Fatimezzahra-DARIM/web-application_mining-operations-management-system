<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Mining')</title>
    @include('.template.adminDashboard.layout.header')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



</head>
<body>
    @include('.template.adminDashboard.layout.navbar')
    @include('.template.adminDashboard.layout.sidebar')

    <div class="mt-16 sm:ml-64">
        <div class="rounded-lg dark:border-gray-700">
            @yield('content')
        </div>
    </div>


    @include('.template.adminDashboard.layout.footer')
  
</body>
</html>
