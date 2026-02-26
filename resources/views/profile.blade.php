<x-layouts.app>
<div class="bg-gray-50" x-data="{ isMenuOpen: false, isBookingOpen: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 10">
    <!-- Header -->
    <nav class="fixed w-full bg-white/95 backdrop-blur-md shadow-lg z-50 transition-all duration-300" :class="{ 'shadow-2xl': scrolled }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-r from-[#37A47D] to-[#2d8a68] rounded-full flex items-center justify-center">
                        <span class="text-white font-bold text-lg">S</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Smile Clinic</h1>
                        <p class="text-xs text-[#37A47D] font-medium">Health & Wellness</p>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Home</a>
                    <div class="relative group">
                        <button class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300 flex items-center">
                            Services
                            <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute top-full left-0 w-64 bg-white rounded-2xl shadow-2xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                            <div class="p-4 space-y-3">
                                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <span class="text-blue-600">🧠</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Psychological</p>
                                        <p class="text-xs text-gray-500">Mental Health Care</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <span class="text-green-600">💪</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Physiocare</p>
                                        <p class="text-xs text-gray-500">Physical Therapy</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <span class="text-yellow-600">🥗</span>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Nutrition</p>
                                        <p class="text-xs text-gray-500">Diet & Wellness</p>
                                    </div>
                                </a>
                                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl hover:bg-gray-50 transition duration-300">
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
                    <a href="#" class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">About</a>
                    <a href="/team" class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Team</a>
                    <a href="#" class="text-gray-700 hover:text-[#37A47D] font-medium transition duration-300">Contact</a>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden md:flex items-center space-x-4">
                    <button @click="isBookingOpen = true" class="bg-[#37A47D] text-white cursor-pointer px-6 py-3 rounded-xl font-semibold hover:bg-[#2d8a68] transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Book Appointment
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="isMenuOpen = !isMenuOpen" class="md:hidden p-2 cursor-pointer rounded-lg bg-gray-100">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="isMenuOpen ? 'M6 18L18 6M6 6l12 12' : 'M4 6h16M4 12h16M4 18h16'" />
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="isMenuOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-4" class="md:hidden py-4 border-t border-gray-200">
                <div class="space-y-4">
                    <a href="/" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Home</a>
                    <a href="#services" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Services</a>
                    <a href="#" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">About</a>
                    <a href="/team" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Team</a>
                    <a href="#" class="block text-gray-700 hover:text-[#37A47D] font-medium py-2">Contact</a>
                    <div class="pt-4 border-t border-gray-200 space-y-3">
                        <button @click="isBookingOpen = true" class="w-full bg-[#37A47D] text-white py-3 rounded-xl font-semibold cursor-pointer">
                            Book Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Profile Content -->
    <main class="pt-24"> <!-- Added padding-top to account for fixed header -->
        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-50 to-cyan-50 py-12">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-2/5 mb-8 md:mb-0 flex justify-center">
                        <div class="relative">
                            <div class="w-64 h-64 bg-gradient-to-br from-blue-100 to-cyan-200 rounded-full flex items-center justify-center text-6xl shadow-xl">
                                👩‍⚕️
                            </div>
                            <div class="absolute -bottom-2 -right-2 w-16 h-16 bg-[#37A47D] rounded-full flex items-center justify-center text-white text-xl shadow-lg">
                                <i class="fas fa-award"></i>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-3/5 text-center md:text-left">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Dr. Khoula Ismail</h1>
                        <div class="inline-block bg-white rounded-full px-6 py-2 shadow-md mb-6">
                            <span class="text-[#37A47D] font-semibold text-lg">Senior Consultant</span>
                        </div>
                        <p class="text-gray-600 text-lg mb-6 max-w-2xl">
                            A renowned mental health professional with over 15 years of experience in clinical psychology, psychotherapy, and hypnotherapy. Dedicated to providing compassionate, evidence-based care.
                        </p>
                        <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                            <div class="flex items-center bg-white rounded-lg px-4 py-2 shadow-sm">
                                <i class="fas fa-user-md text-[#37A47D] mr-2"></i>
                                <span class="text-gray-700">15+ Years Experience</span>
                            </div>
                            <div class="flex items-center bg-white rounded-lg px-4 py-2 shadow-sm">
                                <i class="fas fa-comments text-blue-500 mr-2"></i>
                                <span class="text-gray-700">2000+ Patients</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-12">
            <div class="max-w-6xl mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Left Column - Main Info -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- About Section -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-user-circle text-[#37A47D] mr-3"></i>
                                About Dr. Ismail
                            </h2>
                            <p class="text-gray-600 mb-4">
                                Dr. Khoula Ismail is a distinguished mental health professional with extensive experience in clinical psychology and psychotherapy. She combines traditional therapeutic approaches with innovative techniques to provide comprehensive care for her patients.
                            </p>
                            <p class="text-gray-600">
                                Her compassionate approach and dedication to mental wellness have made her one of the most sought-after professionals in her field. She believes in empowering individuals to overcome challenges and achieve mental and emotional balance.
                            </p>
                        </div>

                        <!-- Specializations -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <i class="fas fa-stethoscope text-[#37A47D] mr-3"></i>
                                Areas of Specialization
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="flex items-start p-4 bg-blue-50 rounded-lg">
                                    <i class="fas fa-brain text-blue-500 mt-1 mr-3"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Clinical Psychology</h3>
                                        <p class="text-gray-600 text-sm">Diagnosis and treatment of mental disorders</p>
                                    </div>
                                </div>
                                <div class="flex items-start p-4 bg-green-50 rounded-lg">
                                    <i class="fas fa-hypnosis text-green-500 mt-1 mr-3"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Hypnotherapy</h3>
                                        <p class="text-gray-600 text-sm">Therapeutic use of hypnosis for behavior change</p>
                                    </div>
                                </div>
                                <div class="flex items-start p-4 bg-purple-50 rounded-lg">
                                    <i class="fas fa-comment-medical text-purple-500 mt-1 mr-3"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Psychotherapy</h3>
                                        <p class="text-gray-600 text-sm">Talk therapy for emotional and mental health issues</p>
                                    </div>
                                </div>
                                <div class="flex items-start p-4 bg-amber-50 rounded-lg">
                                    <i class="fas fa-graduation-cap text-amber-500 mt-1 mr-3"></i>
                                    <div>
                                        <h3 class="font-semibold text-gray-800">Mental Health Training</h3>
                                        <p class="text-gray-600 text-sm">Training professionals in mental health first aid</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Education & Certifications -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <i class="fas fa-graduation-cap text-[#37A47D] mr-3"></i>
                                Education & Certifications
                            </h2>
                            <div class="space-y-6">
                                <div class="flex">
                                    <div class="flex flex-col items-center mr-4">
                                        <div class="w-10 h-10 bg-[#37A47D] rounded-full flex items-center justify-center">
                                            <i class="fas fa-certificate text-white"></i>
                                        </div>
                                        <div class="w-1 h-full bg-gray-200 mt-2"></div>
                                    </div>
                                    <div class="pb-6">
                                        <h3 class="font-bold text-gray-800">Certified Hypnotherapist</h3>
                                        <p class="text-[#37A47D] font-medium">National Guild of Hypnotists (NGH), USA</p>
                                        <p class="text-gray-600 text-sm mt-1">2015 - Present</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex flex-col items-center mr-4">
                                        <div class="w-10 h-10 bg-[#37A47D] rounded-full flex items-center justify-center">
                                            <i class="fas fa-certificate text-white"></i>
                                        </div>
                                        <div class="w-1 h-full bg-gray-200 mt-2"></div>
                                    </div>
                                    <div class="pb-6">
                                        <h3 class="font-bold text-gray-800">Certified Psychotherapist</h3>
                                        <p class="text-[#37A47D] font-medium">FAPBS Certification</p>
                                        <p class="text-gray-600 text-sm mt-1">2012 - Present</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex flex-col items-center mr-4">
                                        <div class="w-10 h-10 bg-[#37A47D] rounded-full flex items-center justify-center">
                                            <i class="fas fa-certificate text-white"></i>
                                        </div>
                                        <div class="w-1 h-full bg-gray-200 mt-2"></div>
                                    </div>
                                    <div class="pb-6">
                                        <h3 class="font-bold text-gray-800">Clinical Psychologist</h3>
                                        <p class="text-[#37A47D] font-medium">Licensed Clinical Psychologist</p>
                                        <p class="text-gray-600 text-sm mt-1">2010 - Present</p>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex flex-col items-center mr-4">
                                        <div class="w-10 h-10 bg-[#37A47D] rounded-full flex items-center justify-center">
                                            <i class="fas fa-certificate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-gray-800">Master Trainer</h3>
                                        <p class="text-[#37A47D] font-medium">Mental Health First Aid (MHFA), Australia</p>
                                        <p class="text-gray-600 text-sm mt-1">2018 - Present</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Patient Testimonials -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <i class="fas fa-comment-dots text-[#37A47D] mr-3"></i>
                                Patient Testimonials
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-gray-50 p-5 rounded-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-3">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Sarah Johnson</h4>
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm italic">
                                        "Dr. Ismail transformed my life with her hypnotherapy sessions. I had struggled with anxiety for years, and after just a few months with her, I feel like a completely different person."
                                    </p>
                                </div>
                                <div class="bg-gray-50 p-5 rounded-lg">
                                    <div class="flex items-center mb-4">
                                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600 mr-3">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-800">Michael Chen</h4>
                                            <div class="flex text-yellow-400">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm italic">
                                        "Her approach to psychotherapy is both professional and deeply compassionate. She created a safe space where I could work through my trauma and rebuild my mental health."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column - Sidebar -->
                    <div class="space-y-6">
                        <!-- Appointment Card -->
                        <div class="bg-white rounded-xl shadow-sm p-6"> <!-- Removed sticky class -->
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Book an Appointment</h3>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800">Consultation Fee</p>
                                        <p class="text-sm text-gray-600">60-minute session</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                                    <div>
                                        <p class="font-medium text-gray-800">Follow-up Session</p>
                                        <p class="text-sm text-gray-600">45-minute session</p>
                                    </div>
                                </div>
                                <button @click="isBookingOpen = true" class="w-full bg-[#37A47D] text-white py-3 rounded-lg font-semibold hover:bg-[#2d8a68] transition duration-300">
                                    Book Now
                                </button>
                                <div class="text-center text-sm text-gray-500 mt-2">
                                    <p>Or call: <span class="text-[#37A47D] font-medium">0333 3893960</span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Contact Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 mr-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="font-medium text-gray-800">dr.ismail@smileclinic.com</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600 mr-3">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Phone</p>
                                        <p class="font-medium text-gray-800">0333 3893960</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Location</p>
                                        <p class="font-medium text-gray-800">Office # B-6,1st Floor, Town Center</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Availability -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Availability</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Monday - Friday</span>
                                    <span class="font-medium text-gray-800">9:00 AM - 5:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Saturday</span>
                                    <span class="font-medium text-gray-800">10:00 AM - 2:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sunday</span>
                                    <span class="font-medium text-gray-800">Closed</span>
                                </div>
                            </div>
                            <div class="mt-4 p-3 bg-amber-50 rounded-lg border border-amber-200">
                                <p class="text-amber-800 text-sm flex items-center">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Emergency appointments available upon request
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <section class="py-20 px-4 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Start Your Health Journey?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">Take the first step towards better health today. Our team is here to support you every step of the way.</p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
                <button @click="isBookingOpen = true" class="bg-[#37A47D] cursor-pointer text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-[#2d8a68] transition duration-300 shadow-lg hover:shadow-xl">
                    Book Your Appointment
                </button>
                <a class="border-2 border-white text-white px-8 py-4 rounded-xl font-semibold text-lg hover:bg-white hover:text-gray-900 transition duration-300">
                    Call: 0333 3893960
                </a>
            </div>

            <div class="border-t border-gray-700 pt-12">
                <div class="grid md:grid-cols-4 gap-8 text-left">
                    <div>
                        <h3 class="font-bold text-lg mb-4">Smile Clinic</h3>
                        <p class="text-gray-400">Comprehensive healthcare and wellness services under one roof.</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-4">Contact</h3>
                        <p class="text-gray-400">Office # B-6,1st Floor, Town Center, Near Habib Metro Bank, Main Abdara Road<br>Peshawar, KP, Pakistan</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-4">Hours</h3>
                        <p class="text-gray-400">Always Open</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-4">Emergency</h3>
                        <p class="text-gray-400">0333 3893960</p>
                    </div>
                </div>

                <div class="border-t border-gray-700 mt-12 pt-8 text-center">
                    <p class="text-gray-400">© 2025 Smile Clinic. All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <div x-show="isBookingOpen" x-cloak x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4"
        @click="isBookingOpen = false">
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-100"
            @click.stop>
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-800">Book Appointment</h3>
                    <button @click="isBookingOpen = false"
                        class="text-gray-400 hover:text-gray-600 cursor-pointer transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Service</label>
                        <select
                            class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#37A47D] focus:border-transparent transition duration-300">
                            <option>Psychological Consultation</option>
                            <option>Physiotherapy Session</option>
                            <option>Nutrition Counseling</option>
                            <option>Autism Therapy</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preferred Date</label>
                            <input type="date"
                                class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#37A47D] focus:border-transparent transition duration-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Time Slot</label>
                            <select
                                class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-[#37A47D] focus:border-transparent transition duration-300">
                                <option>9:00 AM</option>
                                <option>10:00 AM</option>
                                <option>11:00 AM</option>
                                <option>2:00 PM</option>
                                <option>3:00 PM</option>
                                <option>4:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#37A47D] cursor-pointer text-white py-4 rounded-xl font-semibold hover:bg-[#2d8a68] transition duration-300 shadow-lg hover:shadow-xl">
                        Confirm Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>