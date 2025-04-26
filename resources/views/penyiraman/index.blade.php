@extends('layouts.app')
@section('Title', 'Penyiraman')
@section('header', 'Penyiraman')
@section('content')

<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="bg-white shadow-md rounded-xl p-4 sm:p-6 max-w-md w-full">
        <h2 class="text-xl font-bold text-gray-800 text-center mb-4">Penyiraman Manual</h2>

        <div class="text-center space-y-4">
            <p class="text-gray-700 text-sm">Tekan tombol di bawah untuk menyiram secara manual.</p>
            <form action="{{ route('penyiraman') }}" method="POST">
                @csrf
                <button type="submit" class="w-full space-y-4 bg-red-500 text-white py-3 rounded-lg font-semibold text-sm hover:bg-red-600 transition">
                    Siram Sekarang
                </button>
            </form>
        </div>
    </div>
</div>





@endsection
