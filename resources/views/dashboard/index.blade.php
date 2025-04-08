@extends('layouts.app')
@section('title', 'Beranda')
@section('content')

 <!-- Main Content -->
 <div class="flex flex-col flex-1 overflow-hidden">
    <!-- Top Navigation -->
    <header class="z-10 bg-white shadow-sm">
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center space-x-4">
                <button id="sidebarToggle" class="block md:hidden">
                    <i class="text-gray-600 fas fa-bars"></i>
                </button>
                <h1 class="text-xl font-semibold text-gray-800">IoT Monitoring</h1>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-1 p-4 overflow-y-auto bg-gray-50">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Temperature</p>
                        <h3 class="text-2xl font-bold">24.5°C</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-arrow-up"></i> 2.3% from yesterday
                        </p>
                    </div>
                    <div class="p-3 rounded-lg bg-primary-100 text-primary-600">
                        <i class="text-xl fas fa-thermometer-half"></i>
                    </div>
                </div>
            </div>
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Humidity</p>
                        <h3 class="text-2xl font-bold">65%</h3>
                        <p class="flex items-center text-sm text-red-500">
                            <i class="mr-1 fas fa-arrow-down"></i> 1.8% from yesterday
                        </p>
                    </div>
                    <div class="p-3 text-blue-600 bg-blue-100 rounded-lg">
                        <i class="text-xl fas fa-tint"></i>
                    </div>
                </div>
            </div>
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Energy Usage</p>
                        <h3 class="text-2xl font-bold">1.2 kW</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-arrow-down"></i> 15% savings
                        </p>
                    </div>
                    <div class="p-3 text-yellow-600 bg-yellow-100 rounded-lg">
                        <i class="text-xl fas fa-bolt"></i>
                    </div>
                </div>
            </div>
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Air Quality</p>
                        <h3 class="text-2xl font-bold">Good</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-check-circle"></i> Optimal
                        </p>
                    </div>
                    <div class="p-3 text-green-600 bg-green-100 rounded-lg">
                        <i class="text-xl fas fa-wind"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-3">
            <!-- Temperature Chart -->
            <div class="col-span-2 p-6 bg-white shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Temperature Trends</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm rounded-lg bg-primary-100 text-primary-600">Day</button>
                        <button class="px-3 py-1 text-sm rounded-lg hover:bg-gray-100">Week</button>
                        <button class="px-3 py-1 text-sm rounded-lg hover:bg-gray-100">Month</button>
                    </div>
                </div>
                <canvas id="temperatureChart" height="250"></canvas>
            </div>

            <!-- Devices Status -->
            <div class="p-6 bg-white shadow-sm rounded-xl">
                <h2 class="mb-4 text-lg font-semibold">Devices Status</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 text-green-600 bg-green-100 rounded-lg">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div>
                                <p class="font-medium">Smart Lights</p>
                                <p class="text-sm text-gray-500">Living Room</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2 h-2 mr-2 bg-green-500 rounded-full"></div>
                            <span class="text-sm">On</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 text-blue-600 bg-blue-100 rounded-lg">
                                <i class="fas fa-thermostat"></i>
                            </div>
                            <div>
                                <p class="font-medium">Thermostat</p>
                                <p class="text-sm text-gray-500">Bedroom</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2 h-2 mr-2 bg-yellow-500 rounded-full"></div>
                            <span class="text-sm">Idle</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 text-purple-600 bg-purple-100 rounded-lg">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div>
                                <p class="font-medium">Smart Lock</p>
                                <p class="text-sm text-gray-500">Front Door</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2 h-2 mr-2 bg-green-500 rounded-full"></div>
                            <span class="text-sm">Locked</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50">
                        <div class="flex items-center space-x-3">
                            <div class="p-2 text-red-600 bg-red-100 rounded-lg">
                                <i class="fas fa-video"></i>
                            </div>
                            <div>
                                <p class="font-medium">Security Cam</p>
                                <p class="text-sm text-gray-500">Backyard</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-2 h-2 mr-2 bg-red-500 rounded-full"></div>
                            <span class="text-sm">Offline</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Humidity Chart -->
            <div class="p-6 bg-white shadow-sm rounded-xl">
                <h2 class="mb-4 text-lg font-semibold">Humidity Level</h2>
                <div class="gauge">
                    <div class="gauge-body">
                        <div class="gauge-fill" id="humidityGauge"></div>
                        <div class="gauge-cover">65%</div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-500">Optimal range: 40% - 60%</p>
                </div>
            </div>

            <!-- Energy Consumption -->
            <div class="p-6 bg-white shadow-sm rounded-xl">
                <h2 class="mb-4 text-lg font-semibold">Energy Consumption</h2>
                <canvas id="energyChart" height="200"></canvas>
            </div>

            <!-- Recent Alerts -->
            <div class="p-6 bg-white shadow-sm rounded-xl">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold">Recent Alerts</h2>
                    <button class="text-sm text-primary-600 hover:text-primary-800">View All</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="p-2 mt-1 text-yellow-600 bg-yellow-100 rounded-lg">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div>
                            <p class="font-medium">High temperature detected</p>
                            <p class="text-sm text-gray-500">Bedroom sensor reached 28°C at 10:30 AM</p>
                            <p class="mt-1 text-xs text-gray-400">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="p-2 mt-1 text-red-600 bg-red-100 rounded-lg">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div>
                            <p class="font-medium">Device offline</p>
                            <p class="text-sm text-gray-500">Backyard camera lost connection</p>
                            <p class="mt-1 text-xs text-gray-400">5 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="p-2 mt-1 text-blue-600 bg-blue-100 rounded-lg">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <div>
                            <p class="font-medium">Maintenance reminder</p>
                            <p class="text-sm text-gray-500">Air filter needs replacement</p>
                            <p class="mt-1 text-xs text-gray-400">Yesterday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection
