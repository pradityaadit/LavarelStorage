<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite('resources/css/app.css') <!-- Pastikan Anda menyertakan Tailwind CSS -->
</head>

<body class="bg-cover bg-center h-screen flex items-center justify-center" style="background-image: url('image/img.jpg');">
    <div class="bg-white bg-opacity-50 rounded-lg shadow-lg p-8 w-96 text-center">
        <h1 class="text-2xl font-semibold mb-4 text-gray-700">Login</h1>
        <p class="text-gray-700 mb-6">Login dulu kalau mau masuk kocakk</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="nim" class="block text-left text-gray-700 mb-1">NIM:</label>
                <input type="text" name="nim" placeholder="Masukkan NIM" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-left text-gray-700 mb-1">Password:</label>
                <input type="password" name="password" placeholder="Masukkan password" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
            </div>

            <button type="submit" class="w-full bg-[#72B1D0] text-white font-semibold py-2 rounded-md hover:bg-[#3D8ED0] transition">Login</button>
        </form>

        @if($errors->any())
        <div class="text-red-500 mt-4">
            <strong>{{ $errors->first() }}</strong>
        </div>
        @endif

        <p class="mt-4 text-gray-700">Belum punya akun? <a href="{{ route('register.form') }}" class="text-blue-500 hover:underline">Daftar di sini</a></p>
    </div>
</body>

</html>