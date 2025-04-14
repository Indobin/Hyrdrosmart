@extends('layouts.app')
@section('Title', 'Penyiraman')
@section('header', 'Penyiraman')
@section('content')

<div class="max-w-md mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-xl p-4 sm:p-6">
        <h2 class="text-xl font-bold text-gray-800 text-center mb-4">Kontrol Penyiraman</h2>

        <!-- Mode Switch -->
        <div class="flex justify-center gap-4 mb-6">
            <button id="otomatisBtn" class="w-1/2 py-2 rounded-md text-sm font-medium bg-green-500 text-white hover:bg-green-600 transition">Otomatis</button>
            <button id="manualBtn" class="w-1/2 py-2 rounded-md text-sm font-medium bg-blue-500 text-white hover:bg-blue-600 transition">Manual</button>
        </div>

        <!-- Panel Otomatis -->
        <div id="otomatisPanel" class="hidden">
            <div class="bg-green-100 text-green-700 rounded p-4 text-sm space-y-2">
                <p><strong>Status:</strong> Aktif</p>
                <p><strong>Terakhir Menyiram:</strong> 10:30 WIB</p>
                <p><strong>Kelembapan Tanah:</strong> 42%</p>
                <p><strong>Suhu Udara:</strong> 30°C</p>
            </div>
        </div>

        <!-- Panel Manual -->
        <div id="manualPanel" class="hidden">
            <div class="text-center space-y-4">
                <p class="text-gray-700 text-sm">Tekan tombol di bawah untuk menyiram secara manual.</p>
                <form action="{{ route('penyiraman') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-lg font-semibold text-sm hover:bg-red-600 transition">Siram Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script: Toggle Mode -->
<script>
    const otomatisBtn = document.getElementById('otomatisBtn');
    const manualBtn = document.getElementById('manualBtn');
    const otomatisPanel = document.getElementById('otomatisPanel');
    const manualPanel = document.getElementById('manualPanel');

    function showPanel(mode) {
        if (mode === 'otomatis') {
            otomatisPanel.classList.remove('hidden');
            manualPanel.classList.add('hidden');
            otomatisBtn.classList.add('ring', 'ring-green-300');
            manualBtn.classList.remove('ring');
        } else {
            manualPanel.classList.remove('hidden');
            otomatisPanel.classList.add('hidden');
            manualBtn.classList.add('ring', 'ring-blue-300');
            otomatisBtn.classList.remove('ring');
        }
    }

    otomatisBtn.addEventListener('click', () => showPanel('otomatis'));
    manualBtn.addEventListener('click', () => showPanel('manual'));

    // Tampilkan default mode (otomatis)
    showPanel('otomatis');
</script>

@endsection
