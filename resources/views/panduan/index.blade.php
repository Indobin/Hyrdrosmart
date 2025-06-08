@extends('layouts.app')
@section('title', 'Panduan-Werbite')
@section('header', 'Panduan Website')
@section('content')
<section id="panduan" class="max-w-4xl px-4 mx-auto my-8">
    <h2 class="mb-6 text-2xl font-bold text-center text-gray-800">Panduan Penggunaan Hydrosmart</h2>

    <div class="space-y-4">
        {{-- Dropdown 1: Panduan Penggunaan Website --}}
        <div class="overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg">
            <details class="group">
                <summary class="flex items-center justify-between p-4 list-none cursor-pointer bg-gradient-to-r from-blue-500 to-blue-600">
                    <span class="text-lg font-semibold text-white">1. Panduan Penggunaan Website</span>
                    <svg class="w-5 h-5 text-white transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pt-2 pb-6 transition-all duration-300 bg-white">
                    <ol class="pl-5 space-y-3 text-gray-700 list-decimal">
                        <li class="pb-2 mb-2 border-b border-gray-100"> Pastikan smartphone/komputer terhubung dengan koneksi internet.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100"> Buka website Hydrosmart.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100"> Login menggunakan username dan password Anda.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100"> Halaman utama akan menampilkan informasi suhu, kelembaban tanah, dan cuaca terkini.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100"> Klik menu <span class="font-medium text-blue-600">Penyiraman</span> untuk masuk ke halaman penyiraman:
                            <ul class="pl-5 mt-2 space-y-1 text-gray-600 list-disc">
                                <li>Jika anda ingin melakukan penyiraman secara manual, maka anda dapat mengklik tombol “Siram Sekarang” dan sistem akan melakukan penyiraman pada tanaman anda.</li>
                            </ul>
                        </li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Klik menu <span class="font-medium text-blue-600">Riwayat Monitoring</span>
                        Klik opsi “Riwayat Monitoring” untuk melihat riwayat pencatatan harian terkait suhu, kelembaban tanah, dan cuaca yang tercatat secara real-time saat penyiraman dilakukan.</li>
                        <li>tombol <span class="font-medium text-blue-600">"Logout"</span> untuk keluar dari akun Anda.</li>
                    </ol>
                </div>
            </details>
        </div>

        {{-- Dropdown 2: Cara Kerja Alat --}}
        <div class="overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg">
            <details class="group">
                <summary class="flex items-center justify-between p-4 list-none cursor-pointer bg-gradient-to-r from-green-500 to-green-600">
                    <span class="text-lg font-semibold text-white">2. Cara Kerja Alat</span>
                    <svg class="w-5 h-5 text-white transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pt-2 pb-6 transition-all duration-300 bg-white">
                    <ol class="pl-5 space-y-3 text-gray-700 list-decimal">
                        <li class="pb-2 mb-2 border-b border-gray-100">Pastikan perangkat IoT tersambung ke sumber listrik dan dalam kondisi menyala.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Setelah login ke website, sistem akan langsung menampilkan data sensor dari perangkat.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Alat membaca suhu dan kelembaban tanah secara berkala (setiap 5 detik).</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Penyiraman otomatis dilakukan jika kelembaban tanah < 40% dan suhu > 34°C atau kelembaban tanah < 40%.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Penyiraman juga dijadwalkan setiap pukul 06.30 dan 16.30 WIB.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Pengguna dapat menyiram secara manual melalui tombol <span class="font-medium text-green-600">"Siram Sekarang"</span> di website.</li>
                        <li class="pb-2 mb-2 ">Saat penyiraman terjadi (baik otomatis atau manual), data suhu, kelembaban tanah, dan cuaca akan dicatat secara otomatis ke dalam sistem sebagai riwayat monitoring.</li>
                    </ol>
                </div>
            </details>
        </div>

        {{-- Dropdown 3: Persyaratan dan Batasan --}}
        <div class="overflow-hidden transition-all duration-300 shadow-md rounded-xl hover:shadow-lg">
            <details class="group">
                <summary class="flex items-center justify-between p-4 list-none cursor-pointer bg-gradient-to-r from-purple-500 to-purple-600">
                    <span class="text-lg font-semibold text-white">3. Persyaratan dan Batasan Penggunaan Alat</span>
                    <svg class="w-5 h-5 text-white transition-transform duration-300 group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <div class="px-6 pt-2 pb-6 transition-all duration-300 bg-white">
                    <ol class="pl-5 space-y-3 text-gray-700 list-decimal">
                        <li class="pb-2 mb-2 border-b border-gray-100 mr"> Perangkat IoT harus selalu terhubung ke internet untuk berfungsi secara real-time.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Lakukan pembersihan sensor suhu dan kelembaban setiap 1-3 bulan (waktu yang dibutuhkan sekitar 5-10 menit).</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Perbaiki atau ganti alat jika terjadi kerusakan atau penurunan akurasi data.</li>
                        <li class="pb-2 mb-2 border-b border-gray-100">Tempatkan alat di lokasi terlindung dari hujan langsung atau kelembaban ekstrem.</li>
                    </ol>
                    <div class="p-3 mt-4 text-yellow-700 border-l-4 border-yellow-400 bg-yellow-50">
                        <p class="font-medium">Catatan:</p>
                        <p>Jangan biarkan perangkat terkena air secara langsung untuk mencegah kerusakan.</p>
                    </div>
                </div>
            </details>
        </div>
    </div>
</section>

<style>
    details[open] summary {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
    details summary::-webkit-details-marker {
        display: none;
    }
</style>

@endsection
