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

    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-2 lg:px-8">
        <div class="text-center lg:text-left">
            <!-- Heading always at the top -->
            <h1 class="text-2xl text-center sm:text-3xl pb-4 pt-8 font-bold font-rubikWetPaint text-gray-100">
                Hallo! {{ auth()->user()->nama }}, Welcome To Dashboard.
            </h1>

            <div class="flex flex-col pt-12 lg:flex-row items-center lg:items-start">
                <!-- Image appears below heading on small screens, to the left on large screens -->
                <div class="profil text-center lg:text-left lg:mr-10 mb-8 lg:mb-0">
                    <img src="{{ auth()->user()->profile_photo_path ? asset('storage/' . auth()->user()->profile_photo_path) : asset('images/default-profile.png') }}"
                        alt="Foto Profil"
                        class="img-profil w-48 h-48 sm:w-64 sm:h-64 lg:w-80 lg:h-80 rounded-full mx-auto lg:mx-0 border-3 border-gray-800 shadow-lg cursor-pointer">
                </div>

                <!-- Text content, appears below image on small screens, to the right on large screens -->
                <div class="lg:flex-1 lg:pr-10">
                    <p class="mt-2 text-sm sm:text-base text-gray-300 font-sans max-w-2xl pb-4">
                        Di sini, saya menyimpan segala hal yang menarik bagi saya—mulai dari data yang saya kumpulkan hingga cerita-cerita inspiratif yang saya temui dalam perjalanan hidup. Setiap bagian dari halaman ini mencerminkan passion dan minat saya, serta harapan untuk berbagi informasi berharga dengan Anda. Mari kita menjelajahi berbagai topik yang penuh wawasan, inovasi, dan kreativitas. Saya berharap Anda menemukan sesuatu yang berguna, menyenangkan, atau bahkan menginspirasi! Selamat menjelajahi, dan jangan ragu untuk berinteraksi.
                    </p>
                    <button class="rounded-md border border-transparent py-2 px-3 flex items-center justify-center text-base font-rubikWetPaint transition-all text-slate-300 hover:bg-slate-700 focus:bg-slate-100 active:bg-slate-700 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none sm:tex-center sm:-mx-4 mx-auto  " type="button">
                        Explore
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-1.5">
                            <path fill-rule="evenodd" d="M16.72 7.72a.75.75 0 0 1 1.06 0l3.75 3.75a.75.75 0 0 1 0 1.06l-3.75 3.75a.75.75 0 1 1-1.06-1.06l2.47-2.47H3a.75.75 0 0 1 0-1.5h16.19l-2.47-2.47a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>