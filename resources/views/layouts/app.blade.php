<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/style-Zs2ylL_4.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/app-BTeRTg_C.css') }}">
    <script src="{{ asset('build/assets/app-DazUXVmF.js') }}" defer></script> --}}
    @vite('resources/css/style.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
    <div class="flex flex-col flex-1 overflow-hidden">
        @include('layouts.header')
        <main class="flex-1 p-4 overflow-y-auto bg-gray-50">
        @yield('content')
        </main>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

</body>
</html>
