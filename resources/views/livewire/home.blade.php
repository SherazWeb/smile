{{-- resources/views/home.blade.php --}}
<div x-data="homePage()" x-init="init">
    <!-- Hero Section -->
    <x-hero-section />

    <!-- Services Section -->
    <section class="py-16 bg-gray-50" id="services">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Comprehensive care solutions tailored to your needs
                </p>
            </div>

            <!-- Service Categories -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <template x-for="service in services" :key="service.id">
                    <button @click="activeService = service.id"
                        :class="[
                            'px-6 py-3 rounded-full font-medium transition-all duration-300',
                            activeService === service.id ?
                            'bg-teal-600 text-white shadow-lg scale-105' :
                            'bg-white text-gray-700 hover:bg-teal-50'
                        ]"
                        x-text="service.name">
                    </button>
                </template>
            </div>

            <!-- Active Service Detail -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <template x-for="service in services" :key="service.id">
                    <div x-show="activeService === service.id" x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100" class="grid md:grid-cols-2 gap-8">

                        <!-- Service Image -->
                        <div class="h-96 md:h-auto">
                            <img :src="service.image" :alt="service.name" class="w-full h-full object-cover">
                        </div>

                        <!-- Service Details -->
                        <div class="p-8 lg:p-12">
                            <h3 class="text-3xl font-bold text-gray-800 mb-4" x-text="service.title">
                            </h3>

                            <p class="text-gray-600 mb-6 leading-relaxed" x-text="service.description">
                            </p>

                            <!-- Features -->
                            <div class="grid grid-cols-2 gap-4 mb-8">
                                <template x-for="feature in service.features" :key="feature">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-5 h-5 text-teal-600 flex-shrink-0" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="text-gray-700" x-text="feature"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- Events & Community Impact Section -->
    <section class="py-16 bg-white" id="events">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Our Community Impact</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Making a Difference Together</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    From awareness campaigns to free health camps, we're committed to serving our community
                </p>
            </div>

            <!-- Impact Stats Summary -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">50+</div>
                    <div class="text-gray-600">Workshops Conducted</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">25+</div>
                    <div class="text-gray-600">Free Health Camps</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">1000+</div>
                    <div class="text-gray-600">Community Members</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">15+</div>
                    <div class="text-gray-600">Partner Organizations</div>
                </div>
            </div>

            <!-- Event Categories Tabs -->
            <div x-data="{ activeEventTab: 'all' }" class="mb-12">

                <!-- Dynamic Category Tabs -->
                <div class="flex flex-wrap justify-center gap-3 mb-8">

                    <button @click="activeEventTab = 'all'"
                        :class="activeEventTab === 'all'
                            ?
                            'bg-teal-600 text-white shadow-lg scale-105 px-6 py-3 rounded-full font-medium' :
                            'bg-gray-100 text-gray-700 hover:bg-teal-50 px-6 py-3 rounded-full font-medium'">
                        All Events
                    </button>

                    @foreach ($categories as $category)
                        <button @click="activeEventTab = '{{ $category->slug }}'"
                            :class="activeEventTab === '{{ $category->slug }}'
                                ?
                                'bg-teal-600 text-white shadow-lg scale-105 px-6 py-3 rounded-full font-medium' :
                                'bg-gray-100 text-gray-700 hover:bg-teal-50 px-6 py-3 rounded-full font-medium'">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <!-- Dynamic Events Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach ($events as $event)
                        <div x-show="activeEventTab === 'all' || activeEventTab === '{{ $event->category->slug }}'"
                            x-transition
                            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">

                            <!-- Image -->
                            <div class="h-48 overflow-hidden relative">
                                <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">

                                <div
                                    class="absolute top-4 right-4 bg-teal-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $event->badge_text }}
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">

                                <!-- Date + Location -->
                                <div class="flex items-center gap-3 text-gray-500 text-sm mb-3">
                                    <span>
                                        {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}
                                    </span>
                                    <span>•</span>
                                    <span>{{ $event->location }}</span>
                                </div>

                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                    {{ $event->title }}
                                </h3>

                                <!-- Description -->
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit($event->description, 120) }}
                                </p>

                                <!-- Tags -->
                                @if ($event->tags)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach ($event->tags as $tag)
                                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif

                                <!-- Footer -->
                                <div class="border-t pt-4 flex items-center justify-between">

                                    <span class="text-sm text-gray-600">
                                        {{ $event->participant_count ?? 0 }}
                                        {{ $event->participant_unit }}
                                    </span>

                                    <a href="{{ route('events.show', $event->slug) }}"
                                        class="text-teal-600 hover:text-teal-700 font-semibold text-sm">
                                        View Details →
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- View All Events Button -->
            <div class="text-center mt-12">
                <a href="{{ route('events.index') }}"
                    class="inline-flex items-center gap-2 bg-white border-2 border-teal-600 text-teal-600 px-8 py-4 rounded-full font-semibold hover:bg-teal-50 transition-colors">
                    View All Events & Activities
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <!-- Partnership CTA -->
            <div class="mt-16 bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl p-8 md:p-12">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Partner With Us</h3>
                        <p class="text-gray-600 max-w-2xl">Interested in collaborating for community wellness programs?
                            Let's create meaningful impact together.</p>
                    </div>
                    <a href="mailto:smilehealthclinic.info@gmail.com?subject=Partnership Inquiry&body=Hello Smile Health Clinic,%0D%0A%0D%0AI am interested in becoming a partner.%0D%0A%0D%0AThank you."
                        class="bg-teal-600 cursor-pointer text-white px-8 py-4 rounded-full font-semibold hover:bg-teal-700 transition-colors whitespace-nowrap inline-block text-center">
                        Become a Partner
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    {{-- <x-values /> --}}

    <!-- MOU & Partnerships Section -->
    <section class="py-16 bg-gradient-to-b from-white to-teal-50" id="partners">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Our Partners in Care</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Memorandum of Understanding</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Strengthening healthcare delivery through strategic partnerships and collaborations
                </p>
            </div>

            <!-- MOU Stats Summary -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">12+</div>
                    <div class="text-gray-600">Active MOUs</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">8</div>
                    <div class="text-gray-600">Hospitals</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">5</div>
                    <div class="text-gray-600">Universities</div>
                </div>
                <div class="text-center p-6 bg-white rounded-xl shadow-sm">
                    <div class="text-3xl md:text-4xl font-bold text-teal-600 mb-2">3</div>
                    <div class="text-gray-600">NGO Partners</div>
                </div>
            </div>

            <!-- MOU Cards Grid -->
            <div x-data="{ activeMou: null }" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- MOU Card 1 - Hospital Partnership -->
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-r from-teal-500 to-blue-500 relative overflow-hidden">
                        <!-- Decorative Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 100 100" fill="white">
                                <pattern id="pattern1" x="0" y="0" width="20" height="20"
                                    patternUnits="userSpaceOnUse">
                                    <circle cx="10" cy="10" r="2" fill="white" />
                                </pattern>
                                <rect width="100" height="100" fill="url(#pattern1)" />
                            </svg>
                        </div>

                        <!-- Logo/Icon -->
                        <div
                            class="absolute top-4 left-4 w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <svg class="w-10 h-10 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 6H20V8H4V6ZM4 11H20V13H4V11ZM4 16H14V18H4V16Z" />
                                <path d="M19 14L22 17L19 20L17 18L19 16Z" transform="rotate(45 19 17)" />
                            </svg>
                        </div>

                        <!-- Partner Type Badge -->
                        <div
                            class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm text-white px-4 py-1 rounded-full text-sm font-semibold border border-white/30">
                            Healthcare
                        </div>
                    </div>

                    <div class="p-6">
                        <!-- Partner Name -->
                        <h3 class="text-xl font-bold text-gray-800 mb-2">City General Hospital</h3>

                        <!-- MOU Details -->
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Signed: Jan 15, 2024</span>
                            <span>•</span>
                            <span>Valid: 3 years</span>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 mb-4 line-clamp-2">
                            Collaborative partnership for patient referrals, specialized surgeries, and emergency care
                            services with priority access for our patients.
                        </p>

                        <!-- Key Benefits/Tags -->
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Patient
                                Referrals</span>
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Emergency Care</span>
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Specialist
                                Access</span>
                        </div>

                        <!-- Expandable Details Button (Mobile/Desktop) -->
                        <button @click="activeMou = activeMou === 1 ? null : 1"
                            class="w-full text-left text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center justify-between group">
                            <span>View partnership details</span>
                            <svg class="w-5 h-5 transform transition-transform group-hover:translate-x-1"
                                :class="{ 'rotate-90': activeMou === 1 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <!-- Expanded Details (Alpine JS controlled) -->
                        <div x-show="activeMou === 1" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-600">
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>24/7 emergency trauma care access</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Monthly joint medical camps</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Discounted diagnostic services</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- MOU Card 2 - University Partnership -->
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-r from-blue-500 to-teal-500 relative overflow-hidden">
                        <!-- Decorative Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 100 100" fill="white">
                                <pattern id="pattern2" x="0" y="0" width="20" height="20"
                                    patternUnits="userSpaceOnUse">
                                    <path d="M0 10 L20 10 M10 0 L10 20" stroke="white" stroke-width="1" />
                                </pattern>
                                <rect width="100" height="100" fill="url(#pattern2)" />
                            </svg>
                        </div>

                        <div
                            class="absolute top-4 left-4 w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <svg class="w-10 h-10 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 3L1 9L5 11.5V18L12 22L19 18V11.5L21 10.5V17H23V9L12 3M12 5.8L17.9 9L12 12.2L6.1 9L12 5.8M7.5 13.6L11 15.8V19.5L7.5 17.3V13.6M13 19.5V15.8L19 12V16.5L13 19.5Z" />
                            </svg>
                        </div>

                        <div
                            class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm text-white px-4 py-1 rounded-full text-sm font-semibold border border-white/30">
                            Academic
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Sarhad University, Peshawar</h3>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Signed: Mar 10, 2024</span>
                            <span>•</span>
                            <span>Valid: 5 years</span>
                        </div>

                        <p class="text-gray-600 mb-4 line-clamp-2">
                            Academic collaboration for research, internships, and clinical training programs. Joint
                            initiatives in community health research.
                        </p>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Research</span>
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Internships</span>
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Clinical
                                Training</span>
                        </div>

                        <button @click="activeMou = activeMou === 2 ? null : 2"
                            class="w-full text-left text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center justify-between group">
                            <span>View partnership details</span>
                            <svg class="w-5 h-5 transform transition-transform group-hover:translate-x-1"
                                :class="{ 'rotate-90': activeMou === 2 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="activeMou === 2" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-600">
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Student internship program (20 seats/year)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Joint research publications</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Faculty exchange programs</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- MOU Card 3 - NGO Partnership -->
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="h-48 bg-gradient-to-r from-teal-500 to-emerald-500 relative overflow-hidden">
                        <!-- Decorative Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 100 100" fill="white">
                                <pattern id="pattern3" x="0" y="0" width="20" height="20"
                                    patternUnits="userSpaceOnUse">
                                    <path d="M10 0 L10 20 M0 10 L20 10" stroke="white" stroke-width="0.5" />
                                    <circle cx="10" cy="10" r="2" fill="white" />
                                </pattern>
                                <rect width="100" height="100" fill="url(#pattern3)" />
                            </svg>
                        </div>

                        <div
                            class="absolute top-4 left-4 w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <svg class="w-10 h-10 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8Z" />
                            </svg>
                        </div>

                        <div
                            class="absolute bottom-4 right-4 bg-white/20 backdrop-blur-sm text-white px-4 py-1 rounded-full text-sm font-semibold border border-white/30">
                            Non-Profit
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Abasyn University, Peshawar</h3>

                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Signed: Feb 20, 2024</span>
                            <span>•</span>
                            <span>Valid: 3 years</span>
                        </div>

                        <p class="text-gray-600 mb-4 line-clamp-2">
                            Community outreach partnership focusing on underserved populations, free health camps, and
                            health awareness programs.
                        </p>

                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Community
                                Outreach</span>
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Free Camps</span>
                            <span class="bg-teal-50 text-teal-700 px-3 py-1 rounded-full text-sm">Awareness</span>
                        </div>

                        <button @click="activeMou = activeMou === 3 ? null : 3"
                            class="w-full text-left text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center justify-between group">
                            <span>View partnership details</span>
                            <svg class="w-5 h-5 transform transition-transform group-hover:translate-x-1"
                                :class="{ 'rotate-90': activeMou === 3 }" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2"
                                    d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        <div x-show="activeMou === 3" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            class="mt-4 pt-4 border-t border-gray-100 text-sm text-gray-600">
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Quarterly free health camps in rural areas</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Health awareness programs in schools</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span>Subsidized treatments for low-income families</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- View All Partners Button -->
            <div class="text-center mt-12">
                <a href=""
                    class="inline-flex items-center gap-2 bg-teal-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-teal-700 transition-colors shadow-lg hover:shadow-xl">
                    View All Partners & Collaborations
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            <!-- Become a Partner CTA -->
            <div class="mt-16 bg-white rounded-2xl p-8 md:p-12 shadow-xl border border-teal-100">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="flex items-start gap-4">
                        <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Interested in Partnering With
                                Us?</h3>
                            <p class="text-gray-600 max-w-2xl">Join our network of healthcare partners and make a
                                difference in community wellness. Let's create meaningful impact together.</p>
                        </div>
                    </div>
                    <a href="mailto:smilehealthclinic.info@gmail.com?subject=Partnership Proposal&body=Dear Smile Health Clinic Team,%0D%0A%0D%0AI am interested in exploring partnership opportunities with your organization.%0D%0A%0D%0A[Please introduce your organization and proposed collaboration]%0D%0A%0D%0AThank you."
                        class="bg-teal-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-teal-700 transition-colors whitespace-nowrap inline-flex items-center gap-2 shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Propose Partnership
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
<section class="py-16 bg-gray-50" id="faq">
    <div class="container mx-auto px-4">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Got Questions?</span>
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Find answers to common questions about our services, appointments, and care process
            </p>
        </div>

        <!-- FAQ Categories -->
        <div x-data="{ activeFaqTab: 'general' }" class="max-w-4xl mx-auto">
            
            <!-- Category Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-10">
                <button @click="activeFaqTab = 'general'"
                    :class="activeFaqTab === 'general'
                        ? 'bg-teal-600 text-white shadow-lg scale-105 px-6 py-3 rounded-full font-medium'
                        : 'bg-white text-gray-700 hover:bg-teal-50 px-6 py-3 rounded-full font-medium shadow-sm'">
                    General
                </button>
                <button @click="activeFaqTab = 'appointments'"
                    :class="activeFaqTab === 'appointments'
                        ? 'bg-teal-600 text-white shadow-lg scale-105 px-6 py-3 rounded-full font-medium'
                        : 'bg-white text-gray-700 hover:bg-teal-50 px-6 py-3 rounded-full font-medium shadow-sm'">
                    Appointments
                </button>
                <button @click="activeFaqTab = 'services'"
                    :class="activeFaqTab === 'services'
                        ? 'bg-teal-600 text-white shadow-lg scale-105 px-6 py-3 rounded-full font-medium'
                        : 'bg-white text-gray-700 hover:bg-teal-50 px-6 py-3 rounded-full font-medium shadow-sm'">
                    Services & Pricing
                </button>
                <button @click="activeFaqTab = 'insurance'"
                    :class="activeFaqTab === 'insurance'
                        ? 'bg-teal-600 text-white shadow-lg scale-105 px-6 py-3 rounded-full font-medium'
                        : 'bg-white text-gray-700 hover:bg-teal-50 px-6 py-3 rounded-full font-medium shadow-sm'">
                    Insurance & Payment
                </button>
            </div>

            <!-- General FAQs -->
            <div x-show="activeFaqTab === 'general'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">What are your clinic's operating hours?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                We're open Monday to Friday from 9:00 AM to 8:00 PM, and Saturdays from 10:00 AM to 4:00 PM. 
                                We remain closed on Sundays and public holidays. Emergency consultations are available by appointment.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">Do I need a referral to book an appointment?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                No referral is needed for most of our services. However, for specialized consultations 
                                or insurance claims, a referral from your primary physician might be required. Our team 
                                can guide you based on your specific needs.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">Is parking available at your facility?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                Yes, we have a dedicated parking area for our patients and visitors. The parking is free 
                                of charge and is monitored by security staff during operating hours.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">Are your facilities accessible for people with disabilities?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                Absolutely. Our clinic is wheelchair accessible with ramps, wide doorways, and accessible 
                                washrooms. Please let us know in advance if you require any specific accommodations.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Appointments FAQs -->
            <div x-show="activeFaqTab === 'appointments'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">How do I schedule an appointment?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                You can book appointments through multiple channels:
                            </p>
                            <ul class="mt-2 space-y-2 text-gray-600">
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Call us at +92 333 3893960</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Use our online booking portal (coming soon)</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Email us at appointments@smilehealthclinic.com</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Visit our reception desk in person</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">What is your cancellation policy?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                We kindly request at least 24 hours' notice for cancellations or rescheduling. 
                                Late cancellations (less than 24 hours) may incur a fee of $25. No-shows without 
                                prior notice will be charged 50% of the consultation fee.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">How early should I arrive for my appointment?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                We recommend arriving 10-15 minutes before your scheduled appointment time to complete 
                                any necessary paperwork. For first-time visitors, please arrive 20 minutes early.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">Can I book appointments for multiple family members?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                Yes, absolutely. You can schedule appointments for different family members in one call. 
                        Please have each person's basic information ready when booking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services & Pricing FAQs -->
            <div x-show="activeFaqTab === 'services'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                
                <div class="space-y-4">
                    <!-- FAQ Item 1 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">What services do you offer for children with special needs?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                Our pediatric special needs services include:
                            </p>
                            <ul class="mt-2 grid grid-cols-2 gap-2 text-gray-600">
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>ABA Therapy</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Speech Therapy</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Occupational Therapy</span>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    <span>Social Skills Groups</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">How much does a typical consultation cost?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                Consultation fees vary by service:
                            </p>
                            <div class="mt-3 space-y-2">
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-700">Initial Psychological Assessment</span>
                                    <span class="font-semibold text-teal-600">---</span>
                                </div>
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-700">Physiotherapy Session</span>
                                    <span class="font-semibold text-teal-600">---</span>
                                </div>
                                <div class="flex justify-between items-center border-b pb-2">
                                    <span class="text-gray-700">Nutrition Consultation</span>
                                    <span class="font-semibold text-teal-600">---</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-700">Therapy Sessions (Children)</span>
                                    <span class="font-semibold text-teal-600">---</span>
                                </div>
                            </div>
                            <p class="text-sm text-gray-500 mt-3">*Package discounts available for multiple sessions</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-shadow">
                        <button @click="open = !open" 
                            class="w-full px-6 py-5 text-left flex items-center justify-between focus:outline-none">
                            <span class="text-lg font-semibold text-gray-800">Do you offer online/virtual consultations?</span>
                            <svg class="w-6 h-6 text-teal-600 transform transition-transform duration-300" 
                                :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" x-collapse class="px-6 pb-5">
                            <p class="text-gray-600 leading-relaxed">
                                Yes, we offer secure video consultations for select services including psychological 
                                counseling, nutritional guidance, and follow-up appointments. Please specify your 
                                preference for virtual consultation when booking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Insurance & Payment FAQs -->
            <div x-show="activeFaqTab === 'insurance'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0">
                
                <div class="space-y-4">
                    
                </div>
            </div>
        </div>

        <!-- Still Have Questions CTA -->
        <div class="text-center mt-12">
            <div class="bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl p-8 max-w-3xl mx-auto">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Still Have Questions?</h3>
                <p class="text-gray-600 mb-6">We're here to help! Reach out to us anytime.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:+923333893960" 
                       class="inline-flex items-center justify-center gap-2 bg-white text-teal-600 px-6 py-3 rounded-full font-semibold hover:bg-teal-50 transition-colors border border-teal-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        Call Us
                    </a>
                    <a href="mailto:smilehealthclinic.info@gmail.com?subject=Question%20from%20Website" 
                       class="inline-flex items-center justify-center gap-2 bg-teal-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-teal-700 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linecap="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Email Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Team Preview -->
    <x-doctor-profile />

    <!-- Testimonials -->
    <x-testimonials />

    <!-- Stats -->
    <x-stats />
</div>

<script>
    function homePage() {
        return {
            activeService: 1,
            activeTestimonial: 0,
            isMenuOpen: false,
            testimonialInterval: null,

            // Services data
            services: [{
                    id: 1,
                    name: 'Psychological',
                    image: '{{ asset('images/psy.jpeg') }}',
                    iconKey: 'psychological',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="28" height="28" fill="#37A47D">
  <path d="M320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576zM229.4 385.9C249.8 413.9 282.8 432 320 432C357.2 432 390.2 413.9 410.6 385.9C418.4 375.2 433.4 372.8 444.1 380.6C454.8 388.4 457.2 403.4 449.4 414.1C420.3 454 373.2 480 320 480C266.8 480 219.7 454 190.6 414.1C182.8 403.4 185.2 388.4 195.9 380.6C206.6 372.8 221.6 375.2 229.4 385.9zM208 272C208 254.3 222.3 240 240 240C257.7 240 272 254.3 272 272C272 289.7 257.7 304 240 304C222.3 304 208 289.7 208 272zM400 240C417.7 240 432 254.3 432 272C432 289.7 417.7 304 400 304C382.3 304 368 289.7 368 272C368 254.3 382.3 240 400 240z"></path>
</svg>`,
                    title: 'Psychological Health Services',
                    description: 'Our licensed psychologists provide evidence-based therapy for anxiety, depression, trauma, and relationship issues. We create safe spaces for healing and personal growth.',
                    features: ['Individual Therapy', 'Couples Counseling', 'Stress Management', 'Trauma Therapy']
                },
                {
                    id: 2,
                    name: 'Physiocare',
                    image: '{{ asset('images/physiocare.jpeg') }}',
                    iconKey: 'physiocare',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="28" height="28" fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 144C350.9 144 376 118.9 376 88C376 57.1 350.9 32 320 32C289.1 32 264 57.1 264 88C264 118.9 289.1 144 320 144zM233.4 291.9L256 269.3L256 338.6C256 366.6 268.2 393.3 289.5 411.5L360.9 472.7C366.8 477.8 370.7 484.8 371.8 492.5L384.4 580.6C386.9 598.1 403.1 610.3 420.6 607.8C438.1 605.3 450.3 589.1 447.8 571.6L435.2 483.5C431.9 460.4 420.3 439.4 402.6 424.2L368.1 394.6L368.1 279.4L371.9 284.1C390.1 306.9 417.7 320.1 446.9 320.1L480.1 320.1C497.8 320.1 512.1 305.8 512.1 288.1C512.1 270.4 497.8 256.1 480.1 256.1L446.9 256.1C437.2 256.1 428 251.7 421.9 244.1L404 221.7C381 192.9 346.1 176.1 309.2 176.1C277 176.1 246.1 188.9 223.4 211.7L188.1 246.6C170.1 264.6 160 289 160 314.5L160 352C160 369.7 174.3 384 192 384C209.7 384 224 369.7 224 352L224 314.5C224 306 227.4 297.9 233.4 291.9zM245.8 471.3C244.3 476.5 241.5 481.3 237.7 485.1L169.4 553.4C156.9 565.9 156.9 586.2 169.4 598.7C181.9 611.2 202.2 611.2 214.7 598.7L283 530.4C294.5 518.9 302.9 504.6 307.4 488.9L309.6 481.3L263.6 441.9C261.1 439.7 258.6 437.5 256.2 435.1L245.8 471.3z"></path></svg>`,
                    title: 'Physiotherapy & Rehabilitation',
                    description: 'Advanced physical therapy treatments for injury recovery, chronic pain management, and mobility improvement using cutting-edge techniques and equipment.',
                    features: ['Sports Injury', 'Post-Surgical Rehab', 'Pain Management', 'Mobility Training']
                },
                {
                    id: 3,
                    name: 'Nutrition',
                    image: '{{ asset('images/diet.png') }}',
                    iconKey: 'nutrition',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="28" height="28" fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M127.9 78.4C127.1 70.2 120.2 64 112 64C103.8 64 96.9 70.2 96 78.3L81.9 213.7C80.6 219.7 80 225.8 80 231.9C80 277.8 115.1 315.5 160 319.6L160 544C160 561.7 174.3 576 192 576C209.7 576 224 561.7 224 544L224 319.6C268.9 315.5 304 277.8 304 231.9C304 225.8 303.4 219.7 302.1 213.7L287.9 78.3C287.1 70.2 280.2 64 272 64C263.8 64 256.9 70.2 256.1 78.4L242.5 213.9C241.9 219.6 237.1 224 231.4 224C225.6 224 220.8 219.6 220.2 213.8L207.9 78.6C207.2 70.3 200.3 64 192 64C183.7 64 176.8 70.3 176.1 78.6L163.8 213.8C163.3 219.6 158.4 224 152.6 224C146.8 224 142 219.6 141.5 213.9L127.9 78.4zM512 64C496 64 384 96 384 240L384 352C384 387.3 412.7 416 448 416L480 416L480 544C480 561.7 494.3 576 512 576C529.7 576 544 561.7 544 544L544 96C544 78.3 529.7 64 512 64z"></path></svg>`,
                    title: 'Nutrition & Dietitian Services',
                    description: 'Personalized dietary plans and nutritional guidance tailored to your health goals, medical conditions, and lifestyle needs.',
                    features: ['Weight Management', 'Medical Nutrition', 'Sports Nutrition', 'Pediatric Nutrition']
                },
                {
                    id: 4,
                    name: 'Autism Therapy',
                    image: '{{ asset('images/smile.jpeg') }}',
                    iconKey: 'autism',
                    icon: `<svg class="w-10 h-10" viewBox="0 0 24 24" fill="#37A47D">
<path d="M9 3H15V9H21V15H15V21H9V15H3V9H9V3Z"
 />
<defs>
<linearGradient id="grad4" x1="3" y1="3" x2="21" y2="21">
<stop stop-color="#06b6d4"/>
<stop offset="1" stop-color="#10b981"/>
</linearGradient>
</defs>
</svg>`,
                    title: 'Autism Therapy',
                    description: 'Specialized care and therapy programs for children with autism spectrum disorder and speech development challenges.',
                    features: ['ABA Therapy', 'Speech Therapy', 'Social Skills', 'Parent Training']
                },
                {
                    id: 5,
                    name: 'Children Care',
                    image: '{{ asset('images/child.jpeg') }}',
                    iconKey: 'children',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="28" height="28" fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320 32C342.1 32 360 49.9 360 72C360 94.1 342.1 112 320 112C297.9 112 280 94.1 280 72C280 49.9 297.9 32 320 32zM40 128C62.1 128 80 145.9 80 168L80 328.2C80 345.2 86.7 361.5 98.7 373.5L149.8 424.6C158.1 432.9 171.1 434.2 180.8 427.7C193.7 419.1 195.5 400.8 184.5 389.9C177.2 382.6 161.4 366.8 137.3 342.7C124.8 330.2 124.8 309.9 137.3 297.4C149.8 284.9 170.1 284.9 182.6 297.4C206.7 321.5 222.5 337.3 229.8 344.6L229.8 344.6L255.1 369.9C276.1 390.9 287.9 419.4 287.9 449.1L287.9 528C287.9 554.5 266.4 576 239.9 576L173.2 576C156.2 576 139.9 569.3 127.9 557.3L28.1 457.4C10.1 439.4 0 415 0 389.5L0 168C0 145.9 17.9 128 40 128zM600 128C622.1 128 640 145.9 640 168L640 389.5C640 415 629.9 439.4 611.9 457.4L512 557.3C500 569.3 483.7 576 466.7 576L400 576C373.5 576 352 554.5 352 528L352 449.1C352 419.4 363.8 390.9 384.8 369.9L410.1 344.6L410.1 344.6C417.4 337.3 433.2 321.5 457.3 297.4C469.8 284.9 490.1 284.9 502.6 297.4C515.1 309.9 515.1 330.2 502.6 342.7C478.5 366.8 462.7 382.6 455.4 389.9C444.4 400.9 446.2 419.1 459.1 427.7C468.8 434.2 481.8 432.9 490.1 424.6L541.2 373.5C553.2 361.5 559.9 345.2 559.9 328.2L560 168C560 145.9 577.9 128 600 128zM384.5 213L364.7 196.3L375.8 285.1C377.4 298.3 368.1 310.2 355 311.9C341.9 313.6 329.9 304.2 328.2 291.1L323.8 256.1L316.2 256.1L311.8 291.1C310.2 304.3 298.2 313.6 285 311.9C271.8 310.2 262.5 298.3 264.2 285.1L275.3 196.3L255.5 213C245.4 221.6 230.2 220.3 221.7 210.2C213.2 200.1 214.4 184.9 224.5 176.4L252.4 152.8C271.3 136.8 295.3 128 320 128C344.7 128 368.7 136.8 387.6 152.7L415.5 176.3C425.6 184.9 426.9 200 418.3 210.1C409.7 220.2 394.6 221.5 384.5 212.9z"></path></svg>`,
                    title: 'Specialized Children Care',
                    description: 'Specialized child and therapy programs for children with autism spectrum disorder and speech development challenges.',
                    features: ['ABA Therapy', 'Speech Therapy', 'Daily Life Skills', 'Academic Schooling',
                        'Nutrition & Diet', 'Occupational Therapy'
                    ]
                },
                {
                    id: 6,
                    name: 'Academics',
                    image: '{{ asset('images/acads.jpeg') }}',
                    iconKey: 'academics',
                    icon: `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" width="28" height="28" fill="#37A47D"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M80 259.8L289.2 345.9C299 349.9 309.4 352 320 352C330.6 352 341 349.9 350.8 345.9L593.2 246.1C602.2 242.4 608 233.7 608 224C608 214.3 602.2 205.6 593.2 201.9L350.8 102.1C341 98.1 330.6 96 320 96C309.4 96 299 98.1 289.2 102.1L46.8 201.9C37.8 205.6 32 214.3 32 224L32 520C32 533.3 42.7 544 56 544C69.3 544 80 533.3 80 520L80 259.8zM128 331.5L128 448C128 501 214 544 320 544C426 544 512 501 512 448L512 331.4L369.1 390.3C353.5 396.7 336.9 400 320 400C303.1 400 286.5 396.7 270.9 390.3L128 331.4z"></path></svg>`,
                    title: 'Academic Support & Learning Programs',
                    description: 'Comprehensive academic support programs for students to enhance learning, boost performance, and overcome educational challenges with personalized guidance.',
                    features: ['Special Education', 'Tutoring', 'Learning Assessments', 'Skill Workshops',
                        'Study Counseling'
                    ]
                }
            ],

            // Smooth scroll to section
            scrollToSection(section) {
                document.getElementById(section)?.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                this.isMenuOpen = false;
            },

            // Initialize testimonial rotation
            init() {
                this.testimonialInterval = setInterval(() => {
                    this.activeTestimonial = (this.activeTestimonial + 1) % 3;
                }, 5000);
            },

            // Clean up interval when component is destroyed
            destroy() {
                if (this.testimonialInterval) {
                    clearInterval(this.testimonialInterval);
                }
            }
        }
    }
</script>
