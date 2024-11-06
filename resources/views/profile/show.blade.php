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

    <div class="container mx-auto p-5 mt-8 max-w-5xl bg-white">

        <h1 class="text-5xl font-bold mb-8 text-slate-800  text-center">Profil Saya</h1>

        <div class="max-w-full  p-6 rounded-lg">

            <div class="flex  space-x-4 ">
                <img src="{{ $user->profile_photo_path ? asset('storage/'.$user->profile_photo_path) : asset('images/default-profile.png') }}" alt="Foto Profil" class="w-[200px] h-[200px] rounded-[10px]">
                <div class="mb-auto w-full">
                    <h2 class="text-3xl font-bold pb-2">{{ $user->nama }}</h2>
                    <div class="py-4">
                        <div class="flex pb-5">
                            <span class="font-semibold">NIM</span>
                            <span class="ml-8 mr-2">:</span>
                            <span>{{ $user->nim }}</span>
                        </div>
                        <hr class="h-1 bg-gray-400 border-0">
                        <div class="flex pb-5">
                            <span class="font-semibold">Jurusan</span>
                            <span class="mx-2">:</span>
                            <span>{{ $user->jurusan }}</span>
                        </div>
                        <hr class="h-1 bg-gray-400 border-0">

                        <div class="flex pb-5">
                            <span class="font-semibold">No HP</span>
                            <span class="ml-4 mr-2">:</span>
                            <span>{{ $user->no_hp }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-6">
                <a href="{{ route('profile.edit') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Update Data Diri</a>
            </div>


        </div>
    </div>
</body>

</html>