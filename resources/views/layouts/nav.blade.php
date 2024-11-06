<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.2.2" defer></script>
</head>

<body>

    <nav class="bg-[#FCEFE1] border-b border-[#FCEFE1] " x-data="{ openMenu: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex md:justify-center items-center py-6 sm:h-16 gap-10">
                <div class="flex pr-8">
                    <!-- Logo / Brand -->
                    <div class="shrink-0 flex items-center pr-[100%]">
                        <a href="#" class="text-xl font-bold">MyApp</a>
                    </div>

                    <!-- Hamburger Menu Button (Only visible on small screens) -->
                    <div class="sm:hidden flex items-center pl-20">
                        <button @click="openMenu = !openMenu" class="text-gray-900 hover:text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <!-- Hamburger Icon -->
                                <path x-show="!openMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                                <!-- Close Icon -->
                                <path x-show="openMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Full Menu for Larger Screens -->
                <div class="hidden z-50 sm:flex sm:items-center sm:ml-6 space-x-8 ">
                    <a href="{{ route('welcome') }}" class="text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-lg text-sm font-medium">Home</a>
                    <!-- Dropdown for Data Mahasiswa -->
                    <div class="relative " x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-lg text-sm font-medium focus:outline-none">
                            Data Mahasiswa
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition class="absolute left-0 mt-2 w-48 rounded-lg shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <a href="{{ route('mahasiswa.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Data Mahasiswa</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Data KRS Mahasiswa</a>
                        </div>
                    </div>

                    <a href="#" class="text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-lg text-sm font-medium">Services</a>
                    <a href="#" class="text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-lg text-sm font-medium">Contact</a>

                    <!-- Profile Dropdown -->
                    <div class="relative z-50" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-lg focus:outline-none">
                            <span>Profile</span>
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-28 text-center rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full  block px-3 py-2 rounded-md text-base font-medium text-center text-red-700 hover:bg-gray-50">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu (Hidden on larger screens) -->
            <div x-show="openMenu" x-transition class="sm:hidden block" id="mobile-menu">
                <div class="pt-2 pb-4 space-y-1">
                    <a href="{{ route('welcome') }}" class="block text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="{{ route('mahasiswa.index') }}" class="block text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Data Mahasiswa</a>
                    <a href="#" class="block text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Data KRS Mahasiswa</a>
                    <a href="#" class="block text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Services</a>
                    <a href="#" class="block text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Contact</a>
                    <a href="#" class="block text-gray-900 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-50">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>