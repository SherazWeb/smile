<x-layouts.app>
{{-- resources/views/about.blade.php --}}
<div x-data="aboutPage()" x-init="init">
    <!-- Hero Section -->
    <section class="relative pt-24 overflow-hidden bg-gradient-to-b from-teal-50 to-white">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute top-20 left-20 w-72 h-72 bg-teal-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute bottom-20 right-20 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider animate-fade-in-down">Who We Are</span>
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6 animate-fade-in-up">About Smile Health Center</h1>
                <p class="text-xl text-gray-600 leading-relaxed animate-fade-in-up animation-delay-200">
                    A journey of compassion, dedication, and transforming lives through comprehensive healthcare since 2016
                </p>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    {{-- <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <!-- Mission Card -->
                <div class="group bg-gradient-to-br from-teal-50 to-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Mission</h2>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        To provide accessible, compassionate, and comprehensive healthcare services that empower individuals and families to achieve optimal well-being. We are committed to breaking barriers in mental health, physical rehabilitation, and specialized care for children with special needs.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-teal-600">
                        <span class="w-12 h-0.5 bg-teal-600"></span>
                        <span class="font-semibold">Healing with Heart</span>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="group bg-gradient-to-br from-blue-50 to-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-teal-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Vision</h2>
                    <p class="text-gray-600 leading-relaxed text-lg">
                        To be a beacon of hope and excellence in healthcare, creating a community where every individual has access to quality mental health services, rehabilitation care, and specialized support for neurodivergent children, regardless of their socioeconomic background.
                    </p>
                    <div class="mt-6 flex items-center gap-2 text-teal-600">
                        <span class="w-12 h-0.5 bg-teal-600"></span>
                        <span class="font-semibold">Hope for Tomorrow</span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Executive Director's Message -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Leadership</span>
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Message from the Executive Director</h2>
                    <div class="w-24 h-1 bg-teal-600 mx-auto rounded-full"></div>
                </div>

                <!-- ED Message Card -->
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
                    <div class="grid md:grid-cols-3">
                        <!-- ED Image & Info -->
                        <div class="md:col-span-1 bg-gradient-to-b from-teal-600 to-teal-700 p-8 text-white flex flex-col items-center text-center">
                            <div class="w-40 h-40 rounded-full border-4 border-white overflow-hidden mb-6 shadow-xl transform hover:scale-105 transition-transform duration-500">
                                <img src="{{ asset('images/ed-placeholder.jpg') }}" alt="Executive Director" class="w-full h-full object-cover">
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Dr. Khoula Islamil</h3>
                            <p class="text-teal-100 mb-4">Executive Director & Founder</p>
                            <div class="flex gap-3 mt-4">
                                <span class="px-3 py-1 bg-white/20 rounded-full text-sm backdrop-blur-sm">Clinical Psychologist</span>
                                <span class="px-3 py-1 bg-white/20 rounded-full text-sm backdrop-blur-sm">10+ Years Experience</span>
                            </div>
                            <div class="mt-6 w-full border-t border-teal-400/30 pt-6">
                                <div class="flex justify-center gap-4">
                                    <a href="#" class="hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.99h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.99C18.343 21.128 22 16.991 22 12z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22 2L15 9M22 2l-7 7M22 2v6M15 9L8 2M15 9L8 2M2 2l7 7M2 2l7 7M2 2v6M9 9L2 16M9 9l7 7M9 9l7 7M22 16l-7-7M22 16l-7-7M22 16v-6M2 16l7-7M2 16l7-7M2 16v-6"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="hover:scale-110 transition-transform">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Message Content -->
                        <div class="md:col-span-2 p-8 md:p-12">
                            <!-- Quote Icon -->
                            <svg class="w-12 h-12 text-teal-200 mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            
                            <div class="space-y-6 text-gray-700 leading-relaxed">
                                <p class="text-xl font-light italic">
                                    "When I started Smile Psychological Clinic in 2016 with just three dedicated psychologists, I had a simple belief: mental health care should be accessible, affordable, and free from stigma. Eight years later, as I walk through our corridors and see children laughing in therapy sessions, adults finding hope in counseling, and families receiving comprehensive care under one roof, I'm reminded why we began this journey."
                                </p>
                                
                                <p>
                                    The expansion to include Physiocare, Nutrition, and Speech Therapy in 2018 was driven by our observation that mental and physical health are inseparable. A child struggling with speech needs nutritional support; an adult with depression benefits from physiotherapy. We wanted to create a holistic ecosystem where every aspect of health is addressed with equal importance.
                                </p>
                                
                                <p>
                                    <span class="font-bold text-teal-600">2023 marked a milestone</span> close to my heart – the launch of our Specialized Children Care Clinic. Having worked with numerous families raising neurodivergent children, I witnessed firsthand the desperate need for integrated, compassionate care. Today, we serve over 200 families with ABA therapy, early intervention, and parent training programs that transform not just children's lives, but entire family dynamics.
                                </p>
                                
                                <div class="bg-teal-50 p-6 rounded-2xl border-l-4 border-teal-600 my-6">
                                    <p class="italic text-gray-700">
                                        "Every child who speaks their first word in our speech therapy room, every adult who finds relief from chronic pain through physiotherapy, every family that leaves our clinic with hope – these moments fuel our commitment to keep expanding, keep serving, and keep smiling."
                                    </p>
                                </div>
                                
                                <p>
                                    Today, with 20+ specialists and 6 integrated services, we've impacted over 5,000 lives. But numbers don't tell the full story. It's the single mother who found affordable therapy for her autistic son. It's the elderly gentleman who regained mobility after a stroke. It's the teenager who overcame anxiety and returned to school.
                                </p>
                                
                                <p>
                                    As we look to the future, our vision remains clear: to break every barrier that prevents people from accessing quality healthcare. Whether through our sliding scale fees, community outreach programs, or partnerships with universities and hospitals, we will continue to ensure that everyone – regardless of their background – can smile with the confidence of good health.
                                </p>
                            </div>
                            
                            <!-- Signature -->
                            <div class="mt-8 pt-8 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-bold text-gray-800 text-xl">Dr. Khoula Islamil</p>
                                        <p class="text-gray-500">Executive Director, Smile Health Center</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Journey Recap (from home page but tailored for about) -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Our Story</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">The Road Traveled</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    From humble beginnings to comprehensive care – a journey of growth and impact
                </p>
            </div>

            <!-- Compact Timeline -->
            <div class="max-w-4xl mx-auto">
                <div class="relative flex flex-col md:flex-row justify-between items-start md:items-center gap-6 md:gap-0">
                    <!-- 2016 -->
                    <div class="relative flex md:flex-col items-center gap-4 w-full md:w-auto group">
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-teal-600 rounded-2xl shadow-xl flex items-center justify-center text-white font-bold text-xl">2016</div>
                        </div>
                        <div class="flex-1 md:text-center">
                            <h3 class="font-bold text-gray-800">Psychological Clinic</h3>
                            <p class="text-sm text-gray-600">Started with 3 psychologists</p>
                        </div>
                    </div>
                    
                    <!-- 2018 -->
                    <div class="relative flex md:flex-col items-center gap-4 w-full md:w-auto group">
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-teal-600 rounded-2xl shadow-xl flex items-center justify-center text-white font-bold text-xl">2018</div>
                        </div>
                        <div class="flex-1 md:text-center">
                            <h3 class="font-bold text-gray-800">Expansion</h3>
                            <p class="text-sm text-gray-600">Physiocare, Nutrition, Speech</p>
                        </div>
                    </div>
                    
                    <!-- 2023 -->
                    <div class="relative flex md:flex-col items-center gap-4 w-full md:w-auto group">
                        <div class="relative z-10">
                            <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-teal-600 rounded-2xl shadow-xl flex items-center justify-center text-white font-bold text-xl">2023</div>
                        </div>
                        <div class="flex-1 md:text-center">
                            <h3 class="font-bold text-gray-800">Children Care</h3>
                            <p class="text-sm text-gray-600">Specialized pediatric wing</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Impact Numbers -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="text-3xl font-bold text-teal-600 mb-2">8+</div>
                    <div class="text-gray-600">Years</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-teal-600 mb-2">6</div>
                    <div class="text-gray-600">Services</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-teal-600 mb-2">20+</div>
                    <div class="text-gray-600">Specialists</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-teal-600 mb-2">5000+</div>
                    <div class="text-gray-600">Lives</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    {{-- <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Our Heroes</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Meet Our Leadership Team</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Dedicated professionals committed to your well-being
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Clinical Director -->
                <div class="group">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('images/team-1.jpg') }}" alt="Clinical Director" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Dr. Fatima Ahmed</h3>
                            <p class="text-teal-600 font-medium mb-3">Clinical Director</p>
                            <p class="text-gray-600 text-sm">PhD Clinical Psychology, 15+ years experience</p>
                        </div>
                    </div>
                </div>

                <!-- Physiotherapy Head -->
                <div class="group">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('images/team-2.jpg') }}" alt="Physiotherapy Head" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Mr. Usman Khan</h3>
                            <p class="text-teal-600 font-medium mb-3">Head of Physiotherapy</p>
                            <p class="text-gray-600 text-sm">DPT, Certified Sports Rehabilitation Specialist</p>
                        </div>
                    </div>
                </div>

                <!-- Children Services Head -->
                <div class="group">
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="h-64 overflow-hidden">
                            <img src="{{ asset('images/team-3.jpg') }}" alt="Children Services" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="text-xl font-bold text-gray-800 mb-1">Ms. Ayesha Malik</h3>
                            <p class="text-teal-600 font-medium mb-3">Children Services Lead</p>
                            <p class="text-gray-600 text-sm">BCBA, Special Education Expert</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Partners Section (Compact) -->
    {{-- <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="text-teal-600 font-semibold text-sm uppercase tracking-wider">Collaborations</span>
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Trusted Partners</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Working together to expand access to quality healthcare
                </p>
            </div>

            <div class="flex flex-wrap justify-center items-center gap-8 max-w-4xl mx-auto">
                <!-- Partner Logos -->
                <div class="bg-white px-8 py-4 rounded-xl shadow-md hover:shadow-xl transition-all">
                    <span class="text-xl font-bold text-gray-700">City General Hospital</span>
                </div>
                <div class="bg-white px-8 py-4 rounded-xl shadow-md hover:shadow-xl transition-all">
                    <span class="text-xl font-bold text-gray-700">Sarhad University</span>
                </div>
                <div class="bg-white px-8 py-4 rounded-xl shadow-md hover:shadow-xl transition-all">
                    <span class="text-xl font-bold text-gray-700">Abasyn University</span>
                </div>
                <div class="bg-white px-8 py-4 rounded-xl shadow-md hover:shadow-xl transition-all">
                    <span class="text-xl font-bold text-gray-700">Health Foundation</span>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- CTA Section -->
    {{-- <section class="py-20 bg-gradient-to-r from-teal-600 to-teal-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Be Part of Our Story</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto opacity-90">
                Whether you need our services, want to collaborate, or wish to support our mission – we're here to connect with you.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="" class="bg-white text-teal-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition-colors shadow-xl hover:shadow-2xl transform hover:scale-105">
                    Contact Us
                </a>
                <a href="" class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-teal-600 transition-all shadow-xl hover:shadow-2xl transform hover:scale-105">
                    Explore Services
                </a>
            </div>
        </div>
    </section> --}}
</div>

<script>
    function aboutPage() {
        return {
            init() {
                // Any about page specific initialization
            }
        }
    }
</script>

<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob {
    animation: blob 7s infinite;
}
.animation-delay-2000 {
    animation-delay: 2s;
}
.animate-fade-in-down {
    animation: fadeInDown 1s ease-out;
}
.animate-fade-in-up {
    animation: fadeInUp 1s ease-out;
}
.animation-delay-200 {
    animation-delay: 200ms;
}
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
</x-layouts.app>