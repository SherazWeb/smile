<section
    class="min-h-[90vh] flex items-center px-4 bg-gradient-to-br from-[#37A47D] via-[#2d8a68] to-[#1f6b4d] relative overflow-hidden">
    <!-- Animated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/5 rounded-full blur-3xl animate-pulse"></div>
        <div
            class="absolute bottom-1/3 right-1/3 w-96 h-96 bg-[#4BB892]/10 rounded-full blur-3xl animate-pulse delay-1000">
        </div>
    </div>

    <div class="max-w-7xl mx-auto w-full relative z-10 py-12">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Hero Content - Left Side -->
            <div class="text-white space-y-6">
                <!-- Badge -->
                <div
                    class="inline-flex items-center space-x-3 bg-white/15 backdrop-blur-sm rounded-full px-5 py-2 border border-white/20">
                    <div class="flex space-x-1">
                        <div class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></div>
                        <div class="w-1.5 h-1.5 bg-white rounded-full animate-pulse delay-150"></div>
                        <div class="w-1.5 h-1.5 bg-white rounded-full animate-pulse delay-300"></div>
                    </div>
                    <span class="text-xs font-semibold">6 Specialized Healthcare Services</span>
                </div>

                <!-- Main Headline -->
                <div class="space-y-4">
                    <h1
                        class="text-4xl md:text-7xl font-bold text-white text-center md:text-left font-serif leading-tight md:leading-tighter">
                        <span
                            class="block opacity-95 transform transition-all duration-300 hover:opacity-100 hover:translate-x-2">Healthy
                            Mind</span>
                        <span
                            class="block opacity-90 transform transition-all duration-300 hover:opacity-100 hover:translate-x-3 mt-2">Healthy
                            Body</span>
                        <span
                            class="block opacity-85 transform transition-all duration-300 hover:opacity-100 hover:translate-x-4 mt-2">Healthy
                            Life</span>
                    </h1>

                    <p class="text-lg md:text-xl opacity-90 leading-relaxed max-w-2xl">
                        Comprehensive medical care across psychology, physiotherapy, nutrition, autism therapy, and
                        more - all integrated under one trusted healthcare ecosystem.
                    </p>
                </div>

                <!-- Stats - More Compact -->
                <div class="grid grid-cols-3 gap-6 py-4">
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold mb-1">500+</div>
                        <div class="text-xs opacity-80 font-medium">Patients Helped</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold mb-1">15+</div>
                        <div class="text-xs opacity-80 font-medium">Expert Doctors</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl md:text-3xl font-bold mb-1">98%</div>
                        <div class="text-xs opacity-80 font-medium">Success Rate</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <button @click="isBookingOpen = true"
                        class="group bg-white cursor-pointer text-[#37A47D] px-6 py-3 rounded-xl font-semibold text-base hover:bg-gray-50 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-0.5 flex items-center justify-center">
                        <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Book Appointment
                    </button>
                    <button @click="scrollToSection('services')"
                        class="group border cursor-pointer border-white text-white px-6 py-3 rounded-xl font-semibold text-base hover:bg-white hover:text-[#37A47D] transition-all duration-300 flex items-center justify-center">
                        <span>Explore Services</span>
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Services Grid - Right Side -->
            <!-- Services Grid - Right Side -->
            <div class="relative">
                <!-- Main Services Grid -->
                <div class="grid grid-cols-2 gap-4 relative z-10">
                    <template x-for="service in services" :key="service.id">
                        <div class="group relative">
                            <!-- Service Card - Enhanced Size & Prominence -->
                            <div class="bg-white/15 backdrop-blur-md rounded-2xl p-5 border-2 border-white/25 hover:border-white/40 hover:bg-white/25 transition-all duration-400 cursor-pointer transform hover:-translate-y-2 hover:scale-105 shadow-lg hover:shadow-2xl"
                                @click="service.id === 6 ? window.location.href = '/academic-services' : (activeService = service.id, scrollToSection('services'))">

                                <!-- Enhanced Icon Container -->
                                <div class="relative mb-4">
                                    <div
                                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mx-auto transform group-hover:scale-110 group-hover:rotate-3 transition duration-400 shadow-xl">
                                        <span x-html="service.icon"></span>
                                    </div>
                                    <!-- Active Indicator -->
                                    <div
                                        class="absolute -top-1 -right-1 w-3 h-3 bg-green-400 rounded-full border-2 border-white opacity-0 group-hover:opacity-100 transition duration-300">
                                    </div>
                                </div>

                                <!-- Enhanced Service Info -->
                                <h3 class="font-bold text-white text-center text-base mb-2 leading-tight"
                                    x-text="service.name"></h3>

                                <!-- Hover Arrow Indicator -->
                                <div
                                    class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition duration-300">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Enhanced Glow Effect -->
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-cyan-400/30 to-emerald-400/30 rounded-2xl blur-xl opacity-0 group-hover:opacity-70 transition duration-500 -z-10">
                            </div>

                            <!-- Pulse Animation on Hover -->
                            <div
                                class="absolute inset-0 border-2 border-white/20 rounded-2xl opacity-0 group-hover:opacity-100 group-hover:animate-pulse transition duration-300 -z-5">
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Enhanced Floating Elements -->
                <div class="absolute -top-6 -right-6 w-20 h-20 bg-yellow-300/30 rounded-full blur-xl animate-pulse">
                </div>
                <div
                    class="absolute -bottom-8 -left-8 w-24 h-24 bg-cyan-300/30 rounded-full blur-xl animate-bounce delay-700">
                </div>

                <!-- Quick Action Hint -->
                {{-- <div
                        class="absolute -bottom-6 left-1/2 transform -translate-x-1/2 bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 border border-white/30">
                        <p class="text-white text-xs font-medium flex items-center space-x-1">
                            <span>Click to explore</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </p>
                    </div> --}}
            </div>
        </div>
    </div>
</section>
