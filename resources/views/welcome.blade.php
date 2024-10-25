<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
</head>

<body class="bg-slate-900">
    @include('layouts.nav')

    <div class="max-w-7xl mx-auto py-2 sm:px-6 lg:px-8">
        <div class="flex items-center">
            <div class="flex-1 pr-10">
                <h1 class="text-3xl pb-4 font-bold text-left font-rubikWetPaint text-gray-100">
                    Hallo! {{ auth()->user()->nama }}, Welcome To Dashboard.
                </h1>
                <p class="mt-2 text-base text-gray-300 font-sans pr-10 max-w-2xl pb-4">
                    Di sini, saya menyimpan segala hal yang menarik bagi saya—mulai dari data yang saya kumpulkan hingga cerita-cerita inspiratif yang saya temui dalam perjalanan hidup. Setiap bagian dari halaman ini mencerminkan passion dan minat saya, serta harapan untuk berbagi informasi berharga dengan Anda. Mari kita menjelajahi berbagai topik yang penuh wawasan, inovasi, dan kreativitas. Saya berharap Anda menemukan sesuatu yang berguna, menyenangkan, atau bahkan menginspirasi! Selamat menjelajahi, dan jangan ragu untuk berinteraksi
                </p>
                <button class="rounded-md border border-transparent py-2 px-1 flex items-center text-center text-base font-rubikWetPaint transition-all text-slate-300 hover:bg-slate-700 focus:bg-slate-100 active:bg-slate-700 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                    Read More
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-1.5">
                        <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
            </div>
            <div class="profil text-center mb-24 pt-24 pr-24">
                <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('images/default-profile.png') }}"
                    alt="Foto Profil"
                    class="img-profil w-80 h-80 rounded-full py-auto mx-auto  border-3 border-gray-800 shadow-[0_0_35px_rgba(255,255,255,255)] cursor-pointer">
            </div>
        </div>
    </div>


</body>

</html>