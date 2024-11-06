<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FCEFE1]">
    @include('layouts.nav')

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-slate-800 text-center">Edit Profil</h1>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="max-w-md mx-auto bg-gray-800 text-white p-6 rounded-lg">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block font-semibold">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ $user->nama }}" class="w-full p-2 rounded text-slate-800" required>
            </div>
            <div class="mb-4">
                <label for="jurusan" class="block font-semibold">Jurusan</label>
                <input type="text" id="jurusan" name="jurusan" value="{{ $user->jurusan }}" class="w-full p-2 rounded text-slate-800" required>
            </div>
            <div class="mb-4">
                <label for="no_hp" class="block font-semibold">No HP</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ $user->no_hp }}" class="w-full p-2 rounded text-slate-800" required>
            </div>
            <div class="mb-4  items-center gap-2">
                <label for="profile_photo" class="block font-semibold">Foto Profil</label>
                <input type="file" id="profile_photo" name="profile_photo" class="hidden" accept="image/*" onchange="updateFileName(this)">
                <button type="button" onclick="document.getElementById('profile_photo').click()" class="bg-gray-600 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded">Choose File</button>
                <span id="file-name" class="text-sm text-gray-500">No file chosen</span>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Simpan Perubahan</button>
                <a href="{{ route('profile.show') }}" class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
            document.getElementById('file-name').innerText = fileName;
        }
    </script>
</body>

</html>