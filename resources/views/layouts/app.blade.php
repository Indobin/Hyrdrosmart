<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
        <div class="flex-1 flex flex-col">
    @include('layouts.header')
    <main class="flex-1 overflow-y-auto p-6 ">
        @yield('content')
    </main>
    @include('layouts.footer')
        </div>
</div>
</body>
</html>
