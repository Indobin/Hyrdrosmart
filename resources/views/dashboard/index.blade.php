@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
    <!-- Suhu -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold text-gray-700">Suhu</h2>
        <p class="text-3xl text-blue-600 font-semibold mt-2">28°C</p>
    </div>

    <!-- Kelembapan Tanah -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold text-gray-700">Kelembapan Tanah</h2>
        <p class="text-3xl text-green-600 font-semibold mt-2">45%</p>
    </div>

    <!-- Kelembapan Udara -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold text-gray-700">Kelembapan Udara</h2>
        <p class="text-3xl text-yellow-600 font-semibold mt-2">60%</p>
    </div>

    <!-- pH Tanah -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-bold text-gray-700">pH Tanah</h2>
        <p class="text-3xl text-red-600 font-semibold mt-2">6.5</p>
    </div>
</div>

<!-- Riwayat Data -->
<div class="mt-6 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-lg font-bold text-gray-700 mb-4">Riwayat Monitoring</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                <th class="border border-gray-300 px-4 py-2">Suhu</th>
                <th class="border border-gray-300 px-4 py-2">Kelembapan Tanah</th>
                <th class="border border-gray-300 px-4 py-2">Kelembapan Udara</th>
                <th class="border border-gray-300 px-4 py-2">pH</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border border-gray-300 px-4 py-2">2025-04-03</td>
                <td class="border border-gray-300 px-4 py-2">28°C</td>
                <td class="border border-gray-300 px-4 py-2">45%</td>
                <td class="border border-gray-300 px-4 py-2">60%</td>
                <td class="border border-gray-300 px-4 py-2">6.5</td>
            </tr>
            <tr>
                <td class="border border-gray-300 px-4 py-2">2025-04-02</td>
                <td class="border border-gray-300 px-4 py-2">27°C</td>
                <td class="border border-gray-300 px-4 py-2">50%</td>
                <td class="border border-gray-300 px-4 py-2">62%</td>
                <td class="border border-gray-300 px-4 py-2">6.4</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
