<nav class="fixed w-full bg-white/95 backdrop-blur-md shadow-lg z-50 transition-all duration-300" x-data="{ scrolled: false }"
    @scroll.window="scrolled = window.scrollY > 10" :class="{ 'shadow-2xl': scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 group">

                <div
                    class="w-12 h-12 bg-gradient-to-r from-[#37A47D] to-[#2d8a68] rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-lg">S</span>
                </div>

                <div class="leading-tight">
                    <span class="block text-xl font-bold text-gray-900 group-hover:text-emerald-600 transition">
                        Smile
                    </span>
                    <span class="block text-sm font-semibold text-gray-600 group-hover:text-emerald-500 transition">
                        Health Center
                    </span>
                </div>

            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/"
                    class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Home</a>
                <div class="relative group">
                    <button
                        class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300 flex items-center">
                        Services
                        <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="absolute top-full left-0 w-64 bg-white rounded-2xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                        <div class="p-4 space-y-3">
                            <a href="#"
                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <span class="text-blue-600">🧠</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Psychological</p>
                                    <p class="text-xs text-gray-500">Mental Health Care</p>
                                </div>
                            </a>
                            <a href="#"
                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <span class="text-green-600">💪</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Physiocare</p>
                                    <p class="text-xs text-gray-500">Physical Therapy</p>
                                </div>
                            </a>
                            <a href="#"
                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                    <span class="text-yellow-600">🥗</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Nutrition</p>
                                    <p class="text-xs text-gray-500">Diet & Wellness</p>
                                </div>
                            </a>
                            <a href="#"
                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <span class="text-purple-600">🌟</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Autism Care</p>
                                    <p class="text-xs text-gray-500">Specialized Therapy</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <a href="/events"
                    class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Events</a>
                <a href="#"
                    class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">About</a>
                <a href="#"
                    class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Team</a>
                <a href="#footer"
                    class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Contact</a>
            </div>

            <!-- CTA Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                {{-- <button class="text-[#37A47D] font-semibold hover:text-[#2d8a68] transition duration-300">
                            Login
                        </button> --}}
                <button @click="isBookingOpen = true"
                    class="bg-[#37A47D] text-white cursor-pointer px-6 py-3 rounded-xl font-semibold hover:bg-[#2d8a68] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    Book Appointment
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="isMenuOpen = !isMenuOpen" class="md:hidden p-2 cursor-pointer rounded-lg bg-gray-100">
                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        :d="isMenuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="isMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-4" class="md:hidden py-4 border-t border-gray-200">
            <div class="space-y-4">
                <a href="#" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Home</a>
                <a href="#services" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Services</a>
                <a href="#" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">About</a>
                <a href="#" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Team</a>
                <a href="#footer" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Contact</a>
                <div class="pt-4 border-t border-gray-200 space-y-3">
                    {{-- <button class="w-full text-center text-[#37A47D] font-semibold py-3">Login</button> --}}
                    <button @click="isBookingOpen = true"
                        class="w-full bg-[#37A47D] text-white py-3 rounded-xl font-semibold cursor-pointer">
                        Book Appointment
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
