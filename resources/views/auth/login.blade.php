<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    @vite('resources/css/app.css')
</head>
{{-- <body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-100 via-white to-emerald-200"> --}}
    <body class="flex items-center justify-center min-h-screen bg-gradient-to-tr from-green-200 via-white to-cyan-100">

    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <img src="{{ asset('images/IconPohon.png') }}" alt="Logo IoT Sengon" class="h-20 mx-auto">
        <h2 class="text-2xl font-bold text-center text-gray-800">Hydrosmart</h2>
        @if (session('error'))
            <div class="p-3 text-sm text-red-700 bg-red-100 rounded-lg">
                {{session('error')}}
            </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf

                <label class="block mb-1 text-gray-600" for="username">Username</label>
                <input type="name" id="username" name="username" value="{{ old('username') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 focus:outline-none">
                    @error('username')
                    <span class="text-xs text-red-600">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <x-input-error :messages="$errors->get('username')" />
                    <div>
            </div>

            <div>
                <label class="block mb-1 text-gray-600" for="password">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-primary-300 focus:outline-none">
            </div>
            <button type="submit" id="loginButton"
            class="w-full py-2 text-white rounded-lg cursor-not-allowed bg-primary-300"
            >
            Masuk
        </button>
        </form>

    </div>
</body>
</html>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const usernameInput = document.getElementById("username");
            const passwordInput = document.getElementById("password");
            const loginButton = document.getElementById("loginButton");

            function toggleButtonState() {
                if (usernameInput.value.trim() !== "" && passwordInput.value.trim() !== "") {
                    loginButton.removeAttribute("disabled");
                    loginButton.classList.remove("bg-primary-400", "cursor-not-allowed");
                    loginButton.classList.add("bg-primary-600", "hover:bg-primary-700");
                } else {
                    loginButton.setAttribute("disabled", "true");
                    loginButton.classList.add("bg-primary-400", "cursor-not-allowed");
                    loginButton.classList.remove("bg-primary-600", "hover:bg-primary-700");
                }
            }

            usernameInput.addEventListener("input", toggleButtonState);
            passwordInput.addEventListener("input", toggleButtonState);
        });
    </script> --}}

