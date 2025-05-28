@extends('layouts.app')
@section('Title', 'Penyiraman')
@section('header', 'Penyiraman')
@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 relative">
    
    <div id="overlay-loading" class="fixed inset-0 bg-white bg-opacity-80 z-50 hidden flex-col items-center justify-center">
        <svg class="animate-spin h-12 w-12 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
        <p class="mt-4 text-sm text-gray-700">Penyiraman sedang berlangsung... Mohon tunggu 20 detik</p>
    </div>


    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-sm">
        <h2 class="text-xl font-bold text-gray-800 text-center mb-6">Penyiraman Manual</h2>

        <form id="form-penyiraman" method="POST">
            @csrf
            <button type="submit" id="btn-siram" class="w-full bg-red-500 text-white text-lg py-4 rounded-lg font-semibold hover:bg-red-600 transition">
                Siram Sekarang
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('form-penyiraman').addEventListener('submit', function(e) {
        e.preventDefault(); 
    
        const button = document.getElementById('btn-siram');
        const overlay = document.getElementById('overlay-loading');

        overlay.classList.remove('hidden');
        button.disabled = true;
    
        fetch("{{ route('penyiraman_manual') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => {

            setTimeout(() => {
                overlay.classList.add('hidden');
                button.disabled = false;
                alert('Penyiraman selesai!');
            }, 5000);
        })
        .catch(error => {
            console.error('Error:', error);
            overlay.classList.add('hidden');
            button.disabled = false;
            alert('Terjadi kesalahan saat menyiram.');
        });
    });
    </script>
    
    





@endsection
