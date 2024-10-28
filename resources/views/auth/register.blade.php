<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    @vite('resources/css/app.css') <!-- Pastikan Anda menyertakan Tailwind CSS -->
</head>

<body class="bg-cover bg-center h-screen flex items-center justify-center" style="background-image: url('image/img.jpg');">
    <div class="bg-white bg-opacity-50 rounded-lg shadow-lg p-8 w-100 text-center ">
        <h1 class="text-2xl font-semibold mb-4 text-gray-700">Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf


            <div class="mb-4">
                <label for="nim" class="block text-left text-gray-700 mb-1">NIM:</label>
                <input type="text" name="nim" placeholder="Masukkan NIM" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
            </div>

            <div class="mb-4">
                <label for="nama" class="block text-left text-gray-700 mb-1">Nama:</label>
                <input type="text" name="nama" placeholder="Masukkan Nama" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
            </div>

            <div class="mb-4">
                <label for="jurusan" class="block text-left text-gray-700 mb-1">Jurusan:</label>
                <input type="text" name="jurusan" placeholder="Masukkan Jurusan" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
            </div>

            <div class="mb-4">
                <label for="no_hp" class="block text-left text-gray-700 mb-1">No HP:</label>
                <input type="text" name="no_hp" placeholder="Masukkan No HP" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
            </div>

            <div class="flex gap-4">
                <div class="mb-4">
                    <label for="password" class="block text-left text-gray-700 mb-1">Password:</label>
                    <input type="password" name="password" placeholder="Masukkan Password" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-left text-gray-700 mb-1">Konfirmasi Password:</label>
                    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required class="w-full p-2 rounded-md border border-gray-300 bg-white text-gray-800 placeholder-gray-500">
                </div>
            </div>


            <button type="submit" class="w-full bg-[#72B1D0] text-white font-semibold py-2 rounded-md hover:bg-[#3D8ED0] transition">Register</button>

            @if($errors->any())
            <div class="text-red-500 mt-4">
                <strong>{{ $errors->first() }}</strong>
            </div>
            @endif
        </form>

        <p class="mt-4 text-gray-700">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 font-bold hover:underline">Masuk di sini</a></p>
    </div>
</body>

</html>