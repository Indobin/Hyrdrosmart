@extends('layouts.app')
@section('title', 'Panduan-Werbite')
@section('header', 'Panduan Website')
@section('content')
<section id="iot" class="my-12">
 <h2 class="text-2xl font-semibold mb-4">Apa itu IoT?</h2>
 <p class="text-lg leading-relaxed mb-4">
     Internet of Things (IoT) adalah konsep di mana perangkat fisik dapat saling terhubung dan bertukar data melalui jaringan internet.
     IoT digunakan dalam berbagai bidang, seperti pertanian, industri, rumah pintar, dan banyak lagi.
 </p>
 <img src="https://via.placeholder.com/800x400" alt="IoT Illustration" class="w-full rounded-lg shadow-lg mb-6">
 <p class="text-lg leading-relaxed mb-4">
     Pada panduan ini, Anda akan belajar cara mengatur dan memanfaatkan perangkat IoT untuk berbagai aplikasi, termasuk monitoring sistem dan automasi.
 </p>
</section>

<section id="setup" class="my-12 bg-gray-100 p-6 rounded-lg shadow-md">
 <h2 class="text-2xl font-semibold mb-4">Cara Setup IoT</h2>
 <p class="text-lg leading-relaxed mb-4">
     Ikuti langkah-langkah berikut untuk memulai setup IoT Anda:
 </p>
 <ol class="list-decimal pl-6 space-y-4">
     <li>Siapkan perangkat IoT yang ingin Anda gunakan (misalnya sensor suhu, kamera, dll).</li>
     <li>Hubungkan perangkat ke jaringan Wi-Fi atau Ethernet.</li>
     <li>Instal aplikasi atau firmware yang diperlukan untuk komunikasi perangkat.</li>
     <li>Mulai konfigurasi perangkat menggunakan interface atau API yang disediakan.</li>
 </ol>
</section>

<section id="faq" class="my-12">
 <h2 class="text-2xl font-semibold mb-4">FAQ (Frequently Asked Questions)</h2>
 <div class="space-y-4">
     <div class="bg-gray-50 p-4 rounded-lg shadow">
         <h3 class="text-xl font-medium">Apa itu IoT?</h3>
         <p class="mt-2">IoT adalah jaringan perangkat yang terhubung yang dapat saling berkomunikasi dan bertukar data secara otomatis.</p>
     </div>
     <div class="bg-gray-50 p-4 rounded-lg shadow">
         <h3 class="text-xl font-medium">Bagaimana cara setup perangkat IoT?</h3>
         <p class="mt-2">Pastikan perangkat terhubung ke jaringan dan memiliki aplikasi atau firmware yang kompatibel untuk konfigurasi awal.</p>
     </div>
 </div>
</section>
@endsection