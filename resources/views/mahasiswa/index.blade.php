<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-[#FCEFE1] ">
    @include('layouts.nav')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4 text-slate-800 text-center">Daftar Mahasiswa</h1>
        @if (session('success'))
        <div x-data="{ show: true }" x-show="show" class="bg-green-500 text-white p-5 mx-[165px] mb-4 rounded-lg flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="text-white ml-4 text-2xl">
                &times;
            </button>
        </div>
        @endif

        <!-- Table Desktop View -->
        <div class="hidden md:block px-40">
            <table class="min-w-full  border-separate text-white ">
                <thead>
                    <tr class="bg-gray-800  rounded-lg">
                        <th class="border px-4 py-2">NIM</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Jurusan</th>
                        <th class="border px-4 py-2">Foto Profil</th>
                        @if(auth()->user()->isAdmin())
                        <th class="border px-4 py-2">No HP</th>
                        <th class="border px-4 py-2">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                    <tr class="text-center text-slate-800 font-awesome">
                        <td class="border border-black px-4 py-2">{{ $mahasiswa->nim }}</td>
                        <td class="border border-black px-4 py-2">{{ $mahasiswa->nama }}</td>
                        <td class="border border-black px-4 py-2">{{ $mahasiswa->jurusan }}</td>
                        <td class="border border-black px-4 py-2">
                            <img src="{{ $mahasiswa->profile_photo_path ? asset('storage/' . $mahasiswa->profile_photo_path) : asset('images/default-profile.png') }}" alt="Foto Profil" class="w-16 h-16 rounded-[10px] mx-auto">
                        </td>

                        @if(auth()->user()->isAdmin())
                        <td class="border border-black px-4 py-2">{{ $mahasiswa->no_hp }}</td>
                        <td class="border border-black px-4 py-2">
                            <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-3 border-b-4 border-green-700 hover:border-green-500 rounded">Update</a>
                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-3 border-b-4 border-red-700 hover:border-red-500 rounded">
                                    Delete
                                </button>
                            </form>

                            <form action="{{ route('mahasiswa.toggleVisibility', $mahasiswa->nim) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-3 rounded">
                                    {{ $mahasiswa->is_visible ? 'Sembunyikan' : 'Tampilkan' }}
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Mobile View -->
        <div class="block md:hidden space-y-4">
            @foreach ($mahasiswas as $mahasiswa)
            <div class="bg-gray-800 p-4 rounded-lg text-white">
                <div class="flex items-center space-x-4 mb-3">
                    <img src="{{ $mahasiswa->profile_photo_path ? asset('storage/' . $mahasiswa->profile_photo_path) : asset('images/default-profile.png') }}" alt="Foto Profil" class="w-16 h-16 rounded-full">
                    <div>
                        <h2 class="text-lg font-bold">{{ $mahasiswa->nama }}</h2>
                        <p class="text-sm text-gray-400">{{ $mahasiswa->nim }}</p>
                    </div>
                </div>
                <p><span class="font-semibold">Jurusan:</span> {{ $mahasiswa->jurusan }}</p>

                @if(auth()->user()->isAdmin())
                <p><span class="font-semibold">No HP:</span> {{ $mahasiswa->no_hp }}</p>
                @endif

                <div class="mt-3 flex space-x-2">
                    @if(auth()->user()->isAdmin())
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-1 px-3 rounded">Update</a>
                    <a href="#" class="bg-red-500 hover:bg-red-400 text-white font-bold py-1 px-3 border-b-4 border-red-700 hover:border-red-500 rounded">Delete</a>
                    <form action="{{ route('mahasiswa.toggleVisibility', $mahasiswa->nim) }}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-white font-bold py-1 px-3 rounded">
                            {{ $mahasiswa->is_visible ? 'Sembunyikan' : 'Tampilkan' }}
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>