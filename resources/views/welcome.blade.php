<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
</head>

<body class="bg-[#FCEFE1]">
    @include('layouts.nav')

    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-2 lg:px-8">
        <div id="particles-js" class="absolute w-full h-full z-1 top-0 left-0"></div>
        <div class="text-xs">
            <div class="text-center   ">
                <h1 class="flex items-center text-4xl px-2 justify-center text-center pt-8 font-black lg:text-7xl m-2 font-SegoeUI text-[#120652] space-x-4 mx-auto">
                    <!-- Nama pengguna -->
                    <span class="text-7xl">Hallo, {{ auth()->user()->nama }}</span>
                </h1>


                <span class="items-center px-2 justify-center sm:justify-start text-center text-2xl pt-2 font-black lg:text-6xl m-2 font-SegoeUI text-[#120652] space-x-4">Welcome To Dashboard.</span>
                <!--Greeting -->
            </div>

            <div class="flex flex-col justify-center pt-10 lg:flex-row items-center lg:items-start">
                <!-- Text content centered -->
                <div class="lg:flex-1 lg:pr-10 text-center">
                    <p class="mt-2 text-sm sm:text-base text-gray-900 font-sans max-w-2xl pb-6 text-center mx-auto">
                        Di sini, saya menyimpan segala hal yang menarik bagi saya—mulai dari data yang saya kumpulkan hingga cerita-cerita inspiratif yang saya temui dalam perjalanan hidup. Setiap bagian dari halaman ini mencerminkan passion dan minat saya, serta harapan untuk berbagi informasi berharga dengan Anda. Mari kita menjelajahi berbagai topik yang penuh wawasan, inovasi, dan kreativitas. Saya berharap Anda menemukan sesuatu yang berguna, menyenangkan, atau bahkan menginspirasi! Selamat menjelajahi, dan jangan ragu untuk berinteraksi.
                    </p>

                    <!-- Button centered -->
                    <div class="flex justify-center">
                        <a href="#_" class="relative inline-flex items-center justify-center p-4 px-6 py-3 overflow-hidden text-indigo-600 transition duration-300 ease-out border-2 border-purple-500 rounded-full shadow-md group">
                            <span class="absolute inset-0 flex items-center justify-center w-full h-full text-white duration-300 -translate-x-full bg-purple-700 group-hover:translate-x-0 ease">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <span class="absolute flex items-center justify-center w-full h-full text-purple-500 transition-all duration-300 transform group-hover:translate-x-full ease">Selengkapnya &rarr;</span>
                            <span class="relative invisible">Button Text</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#120652"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#120652",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse" // Bisa juga "grab" atau "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>

</body>

</html>