<header class="z-10 bg-white shadow-sm">
    <div class="flex items-center justify-between p-4">
        <div class="flex items-center space-x-4">
            <button id="sidebarToggle" class="block md:hidden">
                <i class="text-gray-600 fas fa-bars"></i>
            </button>
            <h1 class="text-xl font-semibold text-gray-800">@yield('header')</h1>
            {{-- <i class="text-gray-500 fas fa-clock"></i>
            <span id="time" class="text-sm font-medium">Loading...</span> --}}
        </div>
        <div class="flex items-center space-x-2 text-gray-800">
            <span id="date" class="text-sm font-medium">Loading...</span>
        </div>
    </div>
</header>
