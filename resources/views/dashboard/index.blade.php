@extends('layouts.app')
@section('title', 'Beranda')
@section('header', 'Monitoring')
@section('content')

 <!-- Main Content -->
    <!-- Main Content Area -->

        {{-- <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-4 mb-6 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500">Suhu Udara</p>
                        <h3 class="text-2xl font-bold">24.5°C</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-arrow-up"></i> 2.3% dari kemarin
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
                        <p class="text-gray-500">Kelembapan Udara</p>
                        <h3 class="text-2xl font-bold">65%</h3>
                        <p class="flex items-center text-sm text-red-500">
                            <i class="mr-1 fas fa-arrow-down"></i> 1.8%  dari kemarin
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
                        <p class="text-gray-500">Kelembapan Tanah</p>
                        <h3 class="text-2xl font-bold">45%</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-arrow-down"></i> 15% dari kemarin
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
                        <p class="text-gray-500">Status Hujan</p>
                        <h3 class="text-2xl font-bold">Tidak Hujan</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-cloud"></i> Cerah sebagian
                        </p>
                    </div>
                    <div class="p-3 text-indigo-600 bg-indigo-100 rounded-lg">
                        <i class="text-xl fas fa-cloud-sun"></i>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <!-- Charts Row -->
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
                    <p class="text-sm text-gray-500">Optimal % - 60%</p>
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
        </div> --}}

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-4 mb-6">
            <h1 class="text-2xl font-semibold">Selamat Datang, {{$user->username}}</h1>
            <span class="text-sm text-gray-700">Monitoring IoT</span>
            <label for="toggle-monitoring" class="relative inline-flex items-center cursor-pointer">
                <input type="checkbox" value="" id="toggle-monitoring" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300
                            peer-checked:after:translate-x-full peer-checked:after:border-white after:content-['']
                            after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300
                            after:border after:rounded-full after:h-5 after:w-5 after:transition-all
                            peer-checked:bg-green-500 relative"></div>
            </label>
            <!-- Suhu Udara -->
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between h-full">
                    <div>
                        <p class="text-gray-500">Suhu Udara</p>
                        <h3 class="text-2xl font-bold">24.5°C</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-arrow-up"></i> 2.3% dari kemarin
                        </p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-3 rounded-lg bg-primary-100 text-primary-600">
                            <i class="text-2xl fas fa-thermometer-half"></i>
                        </div>
                        <span class="mt-1 text-xs text-green-600">Optimal</span>
                    </div>
                </div>
            </div>


            <!-- Kelembapan Tanah -->
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between h-full">
                    <div>
                        <p class="text-gray-500">Kelembapan Tanah</p>
                        <h3 class="text-2xl font-bold">45%</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-arrow-down"></i> 15% dari kemarin
                        </p>
                    </div>
                    <div class="flex flex-col items-center justify-center h-full space-y-2">
                        <div class="p-3 text-yellow-600 bg-yellow-100 rounded-lg">
                            <i class="text-2xl fas fa-bolt"></i>
                        </div>
                        <span class="mt-1 text-xs text-green-600">Optimal</span>
                        {{-- <span class="text-xs text-red-600">Peringatan</span> --}}
                    </div>
                </div>
            </div>

            <!-- Status Hujan -->
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between h-full">
                    <div>
                        <p class="text-gray-500">Status Hujan</p>
                        <h3 class="text-2xl font-bold">Tidak Hujan</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-cloud"></i> Cerah sebagian
                        </p>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="p-3 text-indigo-600 bg-indigo-100 rounded-lg">
                            <i class="text-2xl fas fa-cloud-sun"></i>
                        </div>

                    </div>
                </div>
            </div>

        </div>



@endsection
