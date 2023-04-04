<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','Mining')</title>
    @include('.template.adminDashboard.layout.header')
</head>
<body>
    @include('.template.adminDashboard.layout.navbar')
    @include('.template.adminDashboard.layout.sidebar')

    <div class="p-4 mt-20 sm:ml-64">
        <div class="p-4 rounded-lg dark:border-gray-700">
            @yield('content')
        </div>
    </div>

    <h1>hello</h1>
</body>
</html>