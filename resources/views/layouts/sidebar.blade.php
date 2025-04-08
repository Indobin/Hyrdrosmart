

<div class="fixed z-50 flex-shrink-0 w-64 h-full text-white transition-transform duration-300 ease-in-out -translate-x-full sidebar bg-primary-800 md:translate-x-0 md:static" id="sidebar">
    <div class="flex items-center justify-between p-4 border-b border-primary-700">
        <div class="flex items-center space-x-2">
            <i class="text-2xl fas fa-leaf text-primary-300"></i>
            <span class="text-xl font-bold">Sengon Iot</span>
        </div>
        <button id="sidebarClose" class="block md:hidden">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="p-4">
        <div class="mb-8">
            <h3 class="mb-4 text-xs font-semibold uppercase text-primary-300">Beranda</h3>
            <ul class="space-y-2">
                <x-nav-link href="{{ route('dashboard') }}" icon="fas fa-chart-line" :active="request()->is('dashboard')">
                    Monitoring
                </x-nav-link>

                <x-nav-link href="{{ route('optimalisasi') }}" icon="fas fa-water" :active="request()->is('optimalisasi')">
                    Penyiraman
                </x-nav-link>

                <x-nav-link href="{{ route('optimalisasi') }}" icon="fas fa-cogs" :active="request()->is('optimalisasi')">
                    Optimalisasi
                </x-nav-link>

                <x-nav-link href="{{ route('optimalisasi') }}" icon="fas fa-history" :active="request()->is('optimalisasi')">
                    Riwayat Monitoring
                </x-nav-link>

            </ul>
        </div>
        <div class="mb-8">
            <h3 class="mb-4 text-xs font-semibold uppercase text-primary-300">Manajemen</h3>
            <ul class="space-y-2">
                <x-nav-link href="route('optimalisasi')" icon="fas fa-user-cog" :active="request()->is('optimalisasi')">
                    Profil
                </x-nav-link>
                <x-nav-link href="route('optimalisasi')" icon="fas fa-exclamation-triangle" :active="request()->is('optimalisasi')">
                    Peringatan
                </x-nav-link>

            </ul>
        </div>
        <div class="p-4 rounded-lg bg-primary-700">
            <div class="mb-2 text-sm">System Status</div>
            <div class="flex items-center justify-between">
                <div class="text-xs text-primary-200">All systems operational</div>
                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
            </div>
        </div>
    </div>
</div>

