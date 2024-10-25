<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Edit Mahasiswa</h1>

        @if ($errors->any())
        <div class="bg-red-500 text-white p-4 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <table class="w-full bg-white shadow-lg rounded-lg overflow-hidden">
                <tbody>
                    <tr class="border-b">
                        <td class="p-4">
                            <label for="nim" class="block text-sm font-medium">NIM</label>
                            <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" class="mt-1 p-3 block w-full bg-gray-100 rounded-md border border-gray-300" readonly>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">
                            <label for="nama" class="block text-sm font-medium">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" class="mt-1 p-3 block w-full  bg-gray-100 rounded-md border border-gray-300" required>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">
                            <label for="jurusan" class="block text-sm font-medium">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan }}" class="mt-1 p-3 block w-full bg-gray-100 rounded-md border border-gray-300" required>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4">
                            <label for="no_hp" class="block text-sm font-medium">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" value="{{ $mahasiswa->no_hp }}" class="mt-1 p-3 block  w-full bg-gray-100 rounded-md border border-gray-300" required>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-4 flex items-center gap-2">
                            <label for="profile_photo" class="flex items-center rounded-md bg-gradient-to-tr from-slate-800 to-slate-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none cursor-pointer">
                                Upload Files
                                <input type="file" name="profile_photo" id="profile_photo" class="hidden" accept="image/*" onchange="updateFileName(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-2">
                                    <path fill-rule="evenodd" d="M10.5 3.75a6 6 0 0 0-5.98 6.496A5.25 5.25 0 0 0 6.75 20.25H18a4.5 4.5 0 0 0 2.206-8.423 3.75 3.75 0 0 0-4.133-4.303A6.001 6.001 0 0 0 10.5 3.75Zm2.03 5.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l1.72-1.72v4.94a.75.75 0 0 0 1.5 0v-4.94l1.72 1.72a.75.75 0 1 0 1.06-1.06l-3-3Z" clip-rule="evenodd" />
                                </svg>
                            </label>
                            <span id="file-name" class="mt-1 text-sm text-gray-500">No file chosen</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-4">
                            @if($mahasiswa->profile_photo_path)
                            <img src="{{ asset('storage/' . $mahasiswa->profile_photo_path) }}" alt="Foto Profil" class="w-48 h-48 rounded-md mb-2">
                            @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil" class="w-24 h-24 rounded-full mb-2">
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="mt-4 text-right">
                <button type="submit" class="bg-slate-700 hover:bg-slate-400 text-white font-bold py-2 px-4 border-b-4 border-slate-600 hover:border-slate-600 rounded">Update</button>
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