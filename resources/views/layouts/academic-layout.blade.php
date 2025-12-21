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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .btn-primary {
            @apply bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg cursor-pointer;
        }
        
        .btn-secondary {
            @apply bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold transition-all duration-300 shadow-md hover:shadow-lg border border-blue-100 cursor-pointer;
        }
        
        .btn-outline {
            @apply border-2 border-white text-white px-6 py-3 rounded-lg font-semibold transition-all duration-300 hover:bg-white hover:bg-opacity-10 cursor-pointer;
        }
        
        .card-hover {
            @apply transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl;
        }
        
        .section-title {
            @apply text-3xl md:text-4xl font-bold text-center mb-4 text-gray-800;
        }
        
        .section-subtitle {
            @apply text-center text-gray-600 max-w-2xl mx-auto mb-12 text-lg;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        }
        
        .tab-active {
            @apply border-b-2 border-blue-500 text-blue-500 font-semibold;
        }
        
        .tab-inactive {
            @apply text-gray-500 hover:text-gray-700;
        }
    </style>

</head>

<body class="antialiased bg-gray-50 text-gray-900" x-data="{}">

    {{ $slot }}

    @livewireScripts
</body>

</html>
