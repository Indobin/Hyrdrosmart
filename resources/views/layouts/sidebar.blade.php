{{-- <aside
    class="fixed inset-y-0 left-0 z-30 w-64 h-screen overflow-y-auto text-white transition-transform
    duration-300 ease-in-out transform bg-green-500 lg:translate-x-0 lg:relative "
    id="sidebar">
    <div class="p-4">
        <h1 class="text-2xl font-bold">Iot Sengon</h1>
    </div>
    <nav class="mt-4">
      <ul class="space-y-2">
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-3">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                  </svg>
                Beranda
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-3">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                  </svg>
                Penyiraman
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-3">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                  </svg>
                Optimalisasi
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-3">
                    <path d="M19.5 21a3 3 0 0 0 3-3v-4.5a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3V18a3 3 0 0 0 3 3h15ZM1.5 10.146V6a3 3 0 0 1 3-3h5.379a2.25 2.25 0 0 1 1.59.659l2.122 2.121c.14.141.331.22.53.22H19.5a3 3 0 0 1 3 3v1.146A4.483 4.483 0 0 0 19.5 9h-15a4.483 4.483 0 0 0-3 1.146Z" />
                  </svg>
                Riwayat Monitoring
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-3">
                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                </svg>
                Profile
            </x-nav-link>
        </li>
        <li>
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-3">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                </svg>
                Logout
            </x-nav-link>
        </li>
    </nav>
</aside> --}}

<div class="sidebar bg-primary-800 text-white w-64 flex-shrink-0 md:translate-x-0 -translate-x-full md:static fixed h-full z-50 transition-transform duration-300 ease-in-out" id="sidebar">
    <div class="p-4 flex items-center justify-between border-b border-primary-700">
        <div class="flex items-center space-x-2">
            <i class="fas fa-leaf text-2xl text-primary-300"></i>
            <span class="text-xl font-bold">Green IoT</span>
        </div>
        <button id="sidebarClose" class="md:hidden block">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="p-4">
        <div class="mb-8">
            <h3 class="text-xs uppercase text-primary-300 font-semibold mb-4">Dashboard</h3>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg bg-primary-700">
                        <i class="fas fa-chart-pie"></i>
                        <span>Overview</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                        <i class="fas fa-thermometer-half"></i>
                        <span>Sensors</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                        <i class="fas fa-lightbulb"></i>
                        <span>Devices</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                        <i class="fas fa-chart-line"></i>
                        <span>Analytics</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="mb-8">
            <h3 class="text-xs uppercase text-primary-300 font-semibold mb-4">Management</h3>
            <ul class="space-y-2">
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-primary-700">
                        <i class="fas fa-bell"></i>
                        <span>Alerts</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="p-4 bg-primary-700 rounded-lg">
            <div class="text-sm mb-2">System Status</div>
            <div class="flex items-center justify-between">
                <div class="text-xs text-primary-200">All systems operational</div>
                <div class="w-3 h-3 rounded-full bg-green-400"></div>
            </div>
        </div>
    </div>
</div>
<script>
     // Sidebar toggle for mobile
     const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebarClose = document.getElementById('sidebarClose');

        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        sidebarClose.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
</script>
