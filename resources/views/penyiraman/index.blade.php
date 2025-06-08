@extends('layouts.app')
@section('Title', 'Penyiraman')
@section('header', 'Penyiraman')
@section('content')

<div class="relative flex items-center justify-center min-h-screen px-4 font-sans bg-gray-100">

    <div id="overlay-loading" class="fixed inset-0 z-50 flex flex-col items-center justify-center hidden bg-white bg-opacity-85">
        <svg class="w-16 h-16 text-red-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        <p class="mt-5 text-base text-gray-700">Penyiraman sedang berlangsung...</p>
        <p class="text-sm text-gray-600">Mohon tunggu sekitar 20 detik.</p>
    </div>

    <div id="message-area" class="fixed top-5 right-0 left-0 sm:left-auto sm:right-5 z-[100] hidden px-4 sm:px-0">
        <div id="message-content" class="max-w-md p-4 mx-auto text-sm text-white rounded-lg shadow-xl sm:mx-0 sm:float-right">
            </div>
    </div>

    <div class="w-full max-w-md p-6 bg-white shadow-2xl sm:p-8 rounded-xl">
        <h2 class="mb-6 text-2xl font-bold text-center text-gray-800 sm:mb-8">Penyiraman Manual</h2>

        <form id="form-penyiraman" method="POST">
            @csrf
            <button type="submit" id="btn-siram"
                    class="w-full py-3 text-base font-semibold text-white transition-colors duration-150 bg-red-500 rounded-lg sm:py-4 sm:text-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 disabled:opacity-50 disabled:cursor-not-allowed">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 mr-2 -mt-1" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 3.5a1.5 1.5 0 011.06.44l4 4a1.5 1.5 0 010 2.12l-4 4A1.5 1.5 0 0110 13V9.923c-2.84.346-5.056 1.68-6.583 3.575A.5.5 0 013 13.18C3 9.052 5.686 5.69 10 5.35V3.5z" />
                    <path d="M3.53 6.46a.5.5 0 010-.708l2-2a.5.5 0 11.707.708L4.56 5.086l1.677 1.677a.5.5 0 01-.707.707l-2-2zM16.47 13.54a.5.5 0 010 .708l-2 2a.5.5 0 01-.707-.708l1.677-1.677-1.677-1.677a.5.5 0 11.707-.707l2 2z" />
                </svg>
                Siram Sekarang
            </button>
        </form>
    </div>
</div>

<script>
    // Function to show messages (replacing alert)
    function showMessage(message, type = 'success') {
        const messageArea = document.getElementById('message-area');
        const messageContent = document.getElementById('message-content');

        messageContent.textContent = message;
        if (type === 'success') {
            messageContent.className = 'max-w-md mx-auto sm:mx-0 sm:float-right p-4 rounded-lg shadow-xl text-white bg-green-500 text-sm';
        } else { // error
            messageContent.className = 'max-w-md mx-auto sm:mx-0 sm:float-right p-4 rounded-lg shadow-xl text-white bg-red-700 text-sm';
        }

        messageArea.classList.remove('hidden');

        // Hide after 3-4 seconds
        setTimeout(() => {
            messageArea.classList.add('hidden');
        }, type === 'success' ? 3000 : 4000); // Longer for errors
    }

    document.getElementById('form-penyiraman').addEventListener('submit', function(e) {
        e.preventDefault();

        const button = document.getElementById('btn-siram');
        const overlay = document.getElementById('overlay-loading');

        // Show overlay and disable button
        overlay.classList.remove('hidden');
        overlay.classList.add('flex'); // Ensure flex is re-added if removed
        button.disabled = true;

        // Perform the fetch request to start watering
        fetch("{{ route('penyiraman_manual') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for Laravel
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({}) // Empty body, adjust if your backend needs data
        })
        .then(response => {
            if (!response.ok) {
                // If server returns an error status (e.g., 4xx, 5xx)
                // Try to parse a JSON error message from the server
                return response.json()
                    .then(errData => {
                        // Prefer a specific error message from server if available
                        throw new Error(errData.message || `Gagal memulai penyiraman. Status: ${response.status}`);
                    })
                    .catch(() => {
                        // Fallback if response is not JSON or no message field
                        throw new Error(`Gagal memulai penyiraman. Status: ${response.status}`);
                    });
            }
            return response.json(); // Or response.text() if server sends text
        })
        .then(data => {
            // Server has acknowledged the request to start watering.
            // Now, keep the overlay for the specified duration (20 seconds).
            // The actual watering process is assumed to be handled by the backend.

            // console.log('Server response:', data); // For debugging server response

            setTimeout(() => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
                button.disabled = false;
                showMessage('Penyiraman selesai!', 'success');
            }, 20000); // 20 seconds (20000 milliseconds)
        })
        .catch(error => {
            console.error('Error during watering process:', error);
            overlay.classList.add('hidden');
            overlay.classList.remove('flex');
            button.disabled = false;
            showMessage(error.message || 'Terjadi kesalahan saat proses penyiraman.', 'error');
        });
    });
</script>
@endsection
