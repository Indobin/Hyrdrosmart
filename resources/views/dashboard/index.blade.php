@extends('layouts.app')
@section('title', 'Monitoring')
@section('header', 'Monitoring')
@section('content')


        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-4 mb-6">
            <h1 class="text-2xl font-semibold">Selamat Datang, {{$user->username}}</h1>
           
            <!-- Suhu Udara -->
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between h-full">
                    <div>
                        <p class="text-gray-500">Suhu Udara</p>
                        <div class="flex items-center">
                            <h3 class="text-2xl font-bold" id="suhu">{{ $suhu ?? '-' }}</h3>
                            <span class="ml-1 text-2xl font-bold">°C</span>
                          </div>
                      </div>
                    <div class="flex flex-col items-center">
                        <div class="p-3 rounded-lg bg-primary-100 text-primary-600">
                            <i class="text-2xl fas fa-thermometer-half"></i>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Kelembapan Tanah -->
            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between h-full">
                    <div>
                        <p class="text-gray-500">Kelembapan Tanah</p>
                        <div class="flex items-center">
                            <h3 id="kelembaban_tanah" class="text-2xl font-bold">{{ $kelembaban_tanah ?? '-' }}</h3>
                            <span class="ml-1 text-2xl font-bold">%</span>
                        </div>

                    </div>
                    <div class="flex flex-col items-center justify-center h-full space-y-2">
                        <div class="p-3 text-yellow-600 bg-yellow-100 rounded-lg">
                            <i class="text-2xl fas fa-bolt"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6 transition-all duration-300 bg-white shadow-sm rounded-xl card-hover">
                <div class="flex items-center justify-between h-full">
                    <div>
                        <p class="text-gray-500">Cuaca Terkini</p>
                        <h3 class="text-2xl font-bold">{{ $temperature }}&deg;C</h3>
                        <p class="flex items-center text-sm text-green-500">
                            <i class="mr-1 fas fa-cloud"></i> {{ $description }}
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
            setInterval(async () => {
              try {
                const res = await axios.get('/sensor-latest');
                document.getElementById('suhu').innerText = res.data.suhu;
                document.getElementById('kelembaban_tanah').innerText = res.data.kelembaban_tanah;
              } catch (err) {
                console.error('Gagal update:', err);
              }
            }, 5000);
          </script>
@endsection
