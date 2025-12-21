<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Smile Clinic - Comprehensive Health & Wellness' }}</title>

    <!-- Tailwind + Livewire -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        x-cloak {
            display: none;
        }
    </style>

</head>

<body class="antialiased bg-gray-50 text-gray-900" x-data="{
    isMenuOpen: false,
    isBookingOpen: false,
}">
    <x-header />
    <div class="min-h-screen">
        {{ $slot }}
    </div>

    <!-- Final CTA Section -->
    <x-footer />

    <!-- Sticky Mobile CTA -->
    <div class="fixed bottom-6 right-6 z-40 md:hidden">
        <button @click="isBookingOpen = true"
            class="bg-[#37A47D] text-white p-4 rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-110 transition duration-300">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </button>
    </div>
    <livewire:booking-form />

    @livewireScripts
</body>

</html>
