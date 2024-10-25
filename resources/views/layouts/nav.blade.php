<nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo / Brand -->
                <div class="shrink-0 flex items-center">
                    <a href="#" class="text-xl font-bold">MyApp</a>
                </div>

                <!-- Menu Items -->
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    <a href="{{route('welcome')}}" class="text-gray-900 hover:bg-gray-50 px-3 py-6 rounded-md text-sm font-medium">Home</a>

                    <!-- Dropdown for Data Mahasiswa -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-900 hover:bg-gray-50 px-3 py-2 my-4 rounded-md text-sm font-medium focus:outline-none">
                            Data Mahasiswa
                            <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown menu items -->
                        <div x-show="open" @click.outside="open = false" x-transition class="absolute left-0 mb-8 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                            <a href="{{ route('mahasiswa.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Data Mahasiswa</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Data KRS Mahasiswa</a>
                        </div>
                    </div>

                    <a href="#" class="text-gray-900 hover:bg-gray-50 px-3 py-6 rounded-md text-sm font-medium">Services</a>
                    <a href="#" class="text-gray-900 hover:bg-gray-50 px-3 py-6 rounded-md text-sm font-medium">Contact</a>
                </div>
            </div>

            <!-- Dropdown & Logout Button -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center text-sm font-medium text-gray-900 hover:text-gray-600 focus:outline-none focus:text-gray-600">
                        <span>Profile</span>
                        <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Profile Dropdown menu -->
                    <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>