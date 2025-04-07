<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    {{-- <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script> --}}
    @vite('resources/css/app.css')
    @vite('resources/js/style.css')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        @include('layouts.sidebar')
        {{-- <div class="flex-1 flex flex-col">
    @include('layouts.header')
    <main class="flex-1 overflow-y-auto p-6 "> --}}
        @yield('content')
    </main>
    @include('layouts.footer')
        </div>
</div>
</body>
</html>
