<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IoT Monitoring</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script>
     --}}
    @vite('resources/css/app.css')
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login ke IoT Monitoring</h2>
        @if (session('error'))
            <div class="p-3 text-sm text-red-700 bg-red-100 rounded-lg">
                {{session('error')}}
            </div>
        @endif
        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 text-gray-600" for="username">Username</label>
                <input type="name" id="username" name="username" value="{{ old('username') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
                    @error('username')
                    <span class="text-red-600 text-xs">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label class="block mb-1 text-gray-600" for="password">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:outline-none">
            </div>
            <button type="submit" id="loginButton"
            class="w-full py-2 text-white bg-blue-400 rounded-lg cursor-not-allowed"
            disabled>
            Masuk
        </button>
        </form>
        <p class="text-center text-gray-500">
            Lupa Password? <a href="#" class="text-blue-600 hover:underline">Klik</a>
        </p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const usernameInput = document.getElementById("username");
            const passwordInput = document.getElementById("password");
            const loginButton = document.getElementById("loginButton");

            function toggleButtonState() {
                if (usernameInput.value.trim() !== "" && passwordInput.value.trim() !== "") {
                    loginButton.removeAttribute("disabled");
                    loginButton.classList.remove("bg-blue-400", "cursor-not-allowed");
                    loginButton.classList.add("bg-blue-600", "hover:bg-blue-700");
                } else {
                    loginButton.setAttribute("disabled", "true");
                    loginButton.classList.add("bg-blue-400", "cursor-not-allowed");
                    loginButton.classList.remove("bg-blue-600", "hover:bg-blue-700");
                }
            }

            usernameInput.addEventListener("input", toggleButtonState);
            passwordInput.addEventListener("input", toggleButtonState);
        });
    </script>
</body>
</html>
