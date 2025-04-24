@extends('layouts.app')
@section('title', 'Beranda')
@section('header', 'Monitoring')
@section('content')


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
                        <div class="flex items-center">
                            <h3 class="text-2xl font-bold" id="suhu">--</h3>
                            <span class="ml-1 text-2xl font-bold">°C</span>
                          </div>
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
                        <div class="flex items-center">
                            <h3 id="kelembaban" class="text-2xl font-bold">--</h3>
                            <span class="ml-1 text-2xl font-bold">%</span>
                        </div>

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
                        <p class="text-gray-500">Cuaca Terkini</p>
                        <h3 class="text-2xl font-bold">35C</h3>
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


        <script>
            // Ganti fungsi updateSensorData() dengan koneksi SSE
    const eventSource = new EventSource('dashboard-monitoring');

    eventSource.onmessage = function(e) {
        const data = JSON.parse(e.data);

        // Update tampilan
        document.getElementById('suhu').textContent = data.temperature.toFixed(1);
        document.getElementById('kelembaban').textContent = data.humidity.toFixed(1);

        // Update chart
        const now = new Date().toLocaleTimeString();
        chart.data.labels.push(now);

        // Batasi jumlah data yang ditampilkan
        if (chart.data.labels.length > 15) {
            chart.data.labels.shift();
            chart.data.datasets[0].data.shift();
            chart.data.datasets[1].data.shift();
        }

        chart.data.datasets[0].data.push(data.temperature);
        chart.data.datasets[1].data.push(data.humidity);
        chart.update();
    };

    // Hapus setInterval jika ada
        </script>
@endsection
