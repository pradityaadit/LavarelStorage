<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FCEFE1]">
    @include('layouts.nav')

    <div class="container mx-auto p-5 mt-8 max-w-5xl bg-slate-800 rounded-[80px] text-white " style="box-shadow: 0 4px 15px rgba(0, 0, 1, 5);">

        <h1 class="text-5xl font-bold mb-8 text-white text-center">Profil Saya</h1>

        <div class="max-w-full  p-6 rounded-lg">

            <div class="flex space-x-4 ">
                <img src="{{ $user->profile_photo_path ? asset('storage/'.$user->profile_photo_path) : asset('images/default-profile.png') }}" alt="Foto Profil" class="w-[220px] h-[220px] rounded-[10px] mt-1">
                <div class="mb-auto w-full">
                    <h2 class="text-3xl font-bold pb-2">{{ $user->nama }}</h2>
                    <div class="py-4">
                        <div class="flex pb-5">
                            <span class="font-semibold">NIM</span>
                            <span class="ml-8 mr-2">:</span>
                            <span>{{ $user->nim }}</span>
                        </div>
                        <hr class="h-1 bg-gray-400 border-0">
                        <div class="flex pb-5 pt-5">
                            <span class="font-semibold">Jurusan</span>
                            <span class="mx-2">:</span>
                            <span>{{ $user->jurusan }}</span>
                        </div>
                        <hr class="h-1 bg-gray-400 border-0">

                        <div class="flex pb-5 pt-5">
                            <span class="font-semibold">No HP</span>
                            <span class="ml-4 mr-2">:</span>
                            <span>{{ $user->no_hp }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="relative inline-flex items-center justify-start  px-5 py-3 overflow-hidden font-bold rounded-full group ">
                <span class="w-32 h-32 rotate-45 translate-x-12 -translate-y-2 absolute left-0 top-0 bg-white opacity-[3%]"></span>
                <span class="absolute top-0 left-0 w-48 h-48 -mt-1 transition-all duration-500 ease-in-out rotate-45 -translate-x-56 -translate-y-24 bg-white opacity-100 group-hover:-translate-x-8"></span>
                <span class="relative w-full text-left text-white transition-colors duration-200 ease-in-out group-hover:text-gray-900">Update Data Diri</span>
                <span class="absolute inset-0 border-2 border-white rounded-full"></span>
            </a>


        </div>
    </div>
</body>

</html>