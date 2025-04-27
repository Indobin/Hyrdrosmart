@extends('layouts.app')
@section('title', 'Riwayat-Monitoring')
@section('header', 'Riwayat Monitoring')
@section('content')
{{-- pertama --}}
<div class="overflow-x-auto">
 <table id="Table" class="table-auto w-full border-collapse border border-gray-200 text-sm sm:text-base">
     <thead>
         <tr class="bg-gray-150">
             <x-table.th>No</x-table.th>
             <x-table.th>Tanggal Monitoring</x-table.th>
             <x-table.th>Suhu</x-table.th>
             <x-table.th>Kelembapan Tanah</x-table.th>
             <x-table.th>Mode Penyiraman</x-table.th>
         </tr>
     </thead>
     <x-table.tbody>
         @foreach ($riwayat as $data)
         <x-table.tr>
             <x-table.td>{{ $loop->iteration }}</x-table.td>
             <x-table.td>{{ $data->tanggal_monitoring->format('d M Y')}}</x-table.td>
             <x-table.td>{{ $data->suhu }}</x-table.td>
             <x-table.td>{{ $data->kelembapan_tanah }}</x-table.td>
             <x-table.td>{{ $data->penyiraman->mode }}</x-table.td>
        
         </x-table.tr>
         @endforeach
     </x-table.tbody>
 </table>
</div>

{{-- AI 1 --}}
{{-- <div class="max-w-6xl mx-auto">
 <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Monitoring IoT</h1>
 
 <!-- Filter dan Pencarian -->
 <div class="flex flex-col md:flex-row justify-between mb-6 gap-4">
   <div class="flex gap-2">
     <select class="px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
       <option>Semua Status</option>
       <option>Normal</option>
       <option>Peringatan</option>
       <option>Kritis</option>
     </select>
     <select class="px-4 py-2 border rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
       <option>Semua Tanggal</option>
       <option>Hari Ini</option>
       <option>Minggu Ini</option>
       <option>Bulan Ini</option>
     </select>
   </div>
   <div class="relative">
     <input type="text" placeholder="Cari..." class="pl-10 pr-4 py-2 border rounded-md w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-500">
     <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
     </svg>
   </div>
 </div>

 <!-- Tabel Utama -->
 <div class="overflow-x-auto bg-white rounded-lg shadow">
   <table class="min-w-full divide-y divide-gray-200">
     <thead class="bg-gray-100">
       <tr>
         <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
         <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Monitoring</th>
         <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Suhu Box</th>
         <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelembapan Tanah</th>
         <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelembapan Udara</th>
         <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
         <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
       </tr>
     </thead>
     <tbody class="divide-y divide-gray-200">
       <!-- Data 1 -->
       <tr class="hover:bg-gray-50">
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">1</td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">15 Apr 2025</td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">32.5°C</span>
             <span class="ml-2 text-red-500">
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
               </svg>
             </span>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">68%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-green-500 h-2 rounded-full" style="width: 68%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">45%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-yellow-500 h-2 rounded-full" style="width: 45%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Peringatan</span>
         </td>
       
       </tr>
       
       <!-- Data 2 -->
       <tr class="hover:bg-gray-50">
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">2</td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">14 Apr 2025</td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">28.3°C</span>
             <span class="ml-2 text-green-500">
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
               </svg>
             </span>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">75%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-green-500 h-2 rounded-full" style="width: 75%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">62%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-green-500 h-2 rounded-full" style="width: 62%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Normal</span>
         </td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 text-center">
           <button class="text-blue-600 hover:underline mr-3">Detail</button>
           <button class="text-red-600 hover:underline">Hapus</button>
         </td>
       </tr>
       
       <!-- Data 3 -->
       <tr class="hover:bg-gray-50">
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">3</td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">13 Apr 2025</td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">36.2°C</span>
             <span class="ml-2 text-red-500">
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
               </svg>
             </span>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">42%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-red-500 h-2 rounded-full" style="width: 42%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">30%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-red-500 h-2 rounded-full" style="width: 30%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Kritis</span>
         </td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 text-center">
           <button class="text-blue-600 hover:underline mr-3">Detail</button>
           <button class="text-red-600 hover:underline">Hapus</button>
         </td>
       </tr>

       <!-- Data 4 -->
       <tr class="hover:bg-gray-50">
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">4</td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">12 Apr 2025</td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">29.7°C</span>
             <span class="ml-2 text-green-500">
               <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
               </svg>
             </span>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">70%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-green-500 h-2 rounded-full" style="width: 70%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <div class="flex items-center">
             <span class="text-sm text-gray-900">58%</span>
             <div class="ml-2 w-16 bg-gray-200 rounded-full h-2">
               <div class="bg-green-500 h-2 rounded-full" style="width: 58%"></div>
             </div>
           </div>
         </td>
         <td class="px-4 py-3 whitespace-nowrap">
           <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Normal</span>
         </td>
         <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 text-center">
           <button class="text-blue-600 hover:underline mr-3">Detail</button>
           <button class="text-red-600 hover:underline">Hapus</button>
         </td>
       </tr>
     </tbody>
   </table>
 </div>

 <!-- Pagination -->
 <div class="flex items-center justify-between mt-6">
   <div class="text-sm text-gray-700">
     Menampilkan <span class="font-medium">1</span> - <span class="font-medium">4</span> dari <span class="font-medium">28</span> data
   </div>
   <div class="flex space-x-2">
     <button class="px-3 py-2 text-sm border rounded-md bg-white text-gray-500 hover:bg-gray-50" disabled>
       Sebelumnya
     </button>
     <button class="px-3 py-2 text-sm border rounded-md bg-white text-gray-500 hover:bg-gray-50">
       1
     </button>
     <button class="px-3 py-2 text-sm border rounded-md bg-blue-600 text-white">
       2
     </button>
     <button class="px-3 py-2 text-sm border rounded-md bg-white text-gray-500 hover:bg-gray-50">
       3
     </button>
     <button class="px-3 py-2 text-sm border rounded-md bg-white text-gray-500 hover:bg-gray-50">
       4
     </button>
     <button class="px-3 py-2 text-sm border rounded-md bg-white text-gray-500 hover:bg-gray-50">
       Selanjutnya
     </button>
   </div>
 </div>
</div> --}}

{{-- AI 2 --}}
{{-- <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabel Monitoring IoT dengan DataTables</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs/2.2.7/responsive.bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive/2.2.7/dataTables.responsive.min.js"></script>
  <style>
    .dataTables_wrapper .dataTables_filter input {
      border: 1px solid #ddd;
      border-radius: 0.375rem;
      padding: 0.375rem 0.75rem;
      margin-left: 0.5rem;
    }
    .dataTables_wrapper .dataTables_length select {
      border: 1px solid #ddd;
      border-radius: 0.375rem;
      padding: 0.375rem 0.75rem;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      border-radius: 0.375rem;
      padding: 0.375rem 0.75rem;
      margin: 0 0.25rem;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      background: #3B82F6 !important;
      border-color: #3B82F6 !important;
      color: white !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      background: #EFF6FF !important;
      border-color: #BFDBFE !important;
      color: #1E3A8A !important;
    }
    table.dataTable thead th {
      background-color: #F3F4F6;
      padding: 12px 10px;
      border-bottom: 2px solid #E5E7EB;
    }
    table.dataTable tbody tr:hover {
      background-color: #F9FAFB;
    }
    .custom-filter {
      margin-bottom: 20px;
    }
    .status-filter {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-bottom: 15px;
    }
    .status-filter button {
      padding: 6px 12px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 500;
      transition: all 0.2s;
    }
    .status-filter button.active {
      transform: scale(1.05);
    }
    .gauge {
      position: relative;
      height: 4px;
      background-color: #E5E7EB;
      border-radius: 4px;
      width: 100px;
      margin-top: 4px;
    }
    .gauge-fill {
      position: absolute;
      height: 100%;
      border-radius: 4px;
    }
    .card-header {
      background: linear-gradient(135deg, #4F46E5 0%, #3B82F6 100%);
      color: white;
    }
  </style>
</head>
<body class="bg-gray-50 p-6">
  <div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
      <div class="card-header p-6">
        <h1 class="text-2xl font-bold text-white">Sistem Monitoring IoT</h1>
        <p class="text-blue-100 mt-1">Pantau data sensor realtime untuk pertanian pintar</p>
      </div>
      
      <div class="p-6">
        <!-- Custom Filters -->
        <div class="custom-filter">
          <label class="block text-sm font-medium text-gray-700 mb-2">Filter Status:</label>
          <div class="status-filter">
            <button class="all-status active bg-gray-200 hover:bg-gray-300 text-gray-800">Semua</button>
            <button class="normal-status bg-green-100 hover:bg-green-200 text-green-800">Normal</button>
            <button class="warning-status bg-yellow-100 hover:bg-yellow-200 text-yellow-800">Peringatan</button>
            <button class="critical-status bg-red-100 hover:bg-red-200 text-red-800">Kritis</button>
          </div>
          
          <div class="flex flex-wrap gap-4 mb-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai:</label>
              <input type="date" class="date-filter border rounded-md p-2 text-sm">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir:</label>
              <input type="date" class="date-filter border rounded-md p-2 text-sm">
            </div>
          </div>
        </div>

        <!-- Dashboard Summary -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
          <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-lg shadow text-white">
            <div class="text-3xl font-bold">28.5°C</div>
            <div class="text-blue-100">Rata-rata Suhu</div>
          </div>
          <div class="bg-gradient-to-r from-green-500 to-green-600 p-4 rounded-lg shadow text-white">
            <div class="text-3xl font-bold">65%</div>
            <div class="text-green-100">Rata-rata Kelembapan Tanah</div>
          </div>
          <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-4 rounded-lg shadow text-white">
            <div class="text-3xl font-bold">52%</div>
            <div class="text-purple-100">Rata-rata Kelembapan Udara</div>
          </div>
          <div class="bg-gradient-to-r from-yellow-500 to-yellow-600 p-4 rounded-lg shadow text-white">
            <div class="text-3xl font-bold">28</div>
            <div class="text-yellow-100">Total Pengukuran</div>
          </div>
        </div>

        <!-- DataTable -->
        <table id="iotTable" class="display responsive nowrap w-full">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Monitoring</th>
              <th>Suhu Box</th>
              <th>Kelembapan Tanah</th>
              <th>Kelembapan Udara</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>15 Apr 2025</td>
              <td>
                <div class="flex items-center">
                  <span>32.5°C</span>
                  <span class="ml-2 text-red-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                  </span>
                </div>
              </td>
              <td>
                <div>68%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 68%"></div>
                </div>
              </td>
              <td>
                <div>45%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-yellow-500" style="width: 45%"></div>
                </div>
              </td>
              <td><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Peringatan</span></td>
              <td>
                <div class="flex space-x-2">
                  <button class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded text-xs">Detail</button>
                  <button class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>14 Apr 2025</td>
              <td>
                <div class="flex items-center">
                  <span>28.3°C</span>
                  <span class="ml-2 text-green-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                    </svg>
                  </span>
                </div>
              </td>
              <td>
                <div>75%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 75%"></div>
                </div>
              </td>
              <td>
                <div>62%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 62%"></div>
                </div>
              </td>
              <td><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Normal</span></td>
              <td>
                <div class="flex space-x-2">
                  <button class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded text-xs">Detail</button>
                  <button class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>13 Apr 2025</td>
              <td>
                <div class="flex items-center">
                  <span>36.2°C</span>
                  <span class="ml-2 text-red-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                  </span>
                </div>
              </td>
              <td>
                <div>42%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-red-500" style="width: 42%"></div>
                </div>
              </td>
              <td>
                <div>30%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-red-500" style="width: 30%"></div>
                </div>
              </td>
              <td><span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Kritis</span></td>
              <td>
                <div class="flex space-x-2">
                  <button class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded text-xs">Detail</button>
                  <button class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>12 Apr 2025</td>
              <td>
                <div class="flex items-center">
                  <span>29.7°C</span>
                  <span class="ml-2 text-green-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </span>
                </div>
              </td>
              <td>
                <div>70%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 70%"></div>
                </div>
              </td>
              <td>
                <div>58%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 58%"></div>
                </div>
              </td>
              <td><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Normal</span></td>
              <td>
                <div class="flex space-x-2">
                  <button class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded text-xs">Detail</button>
                  <button class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>11 Apr 2025</td>
              <td>
                <div class="flex items-center">
                  <span>27.1°C</span>
                  <span class="ml-2 text-green-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </span>
                </div>
              </td>
              <td>
                <div>72%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 72%"></div>
                </div>
              </td>
              <td>
                <div>61%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-green-500" style="width: 61%"></div>
                </div>
              </td>
              <td><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Normal</span></td>
              <td>
                <div class="flex space-x-2">
                  <button class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded text-xs">Detail</button>
                  <button class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Hapus</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>6</td>
              <td>10 Apr 2025</td>
              <td>
                <div class="flex items-center">
                  <span>33.8°C</span>
                  <span class="ml-2 text-yellow-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                  </span>
                </div>
              </td>
              <td>
                <div>56%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-yellow-500" style="width: 56%"></div>
                </div>
              </td>
              <td>
                <div>43%</div>
                <div class="gauge">
                  <div class="gauge-fill bg-yellow-500" style="width: 43%"></div>
                </div>
              </td>
              <td><span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Peringatan</span></td>
              <td>
                <div class="flex space-x-2">
                  <button class="bg-blue-100 hover:bg-blue-200 text-blue-800 px-2 py-1 rounded text-xs">Detail</button>
                  <button class="bg-red-100 hover:bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Hapus</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      // Initialize DataTable
      var table = $('#iotTable').DataTable({
        responsive: true,
        language: {
          search: "Pencarian:",
          lengthMenu: "Tampilkan _MENU_ data per halaman",
          zeroRecords: "Tidak ada data yang ditemukan",
          info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          infoEmpty: "Tidak ada data tersedia",
          infoFiltered: "(difilter dari _MAX_ total data)",
          paginate: {
            first: "Pertama",
            last: "Terakhir",
            next: "Selanjutnya",
            previous: "Sebelumnya"
          }
        }
      });

      // Filter by status
      $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
          var status = data[5].toLowerCase();
          var showNormal = $('.normal-status').hasClass('active');
          var showWarning = $('.warning-status').hasClass('active');
          var showCritical = $('.critical-status').hasClass('active');
          var showAll = $('.all-status').hasClass('active');
          
          if (showAll) return true;
          if (showNormal && status.includes('normal')) return true;
          if (showWarning && status.includes('peringatan')) return true;
          if (showCritical && status.includes('kritis')) return true;
          
          return false;
        }
      );

      // Status filter buttons
      $('.status-filter button').on('click', function() {
        $('.status-filter button').removeClass('active');
        $(this).addClass('active');
        table.draw();
      });

      // Add active class styles
      $('.status-filter button.active').css({
        'transform': 'scale(1.05)',
        'border': '2px solid currentColor'
      });
    });
  </script>
</body>
</html> --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $('#Table').DataTable({
        responsive: true,
        autoWidth: false,
        scrollX: true,
    });
});
</script>
@endsection
