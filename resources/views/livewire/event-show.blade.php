<div>
<div class="bg-gray-50 min-h-screen py-20">

    <!-- GALLERY SECTION - Full width at top -->
    @if($event->gallery_folder && count($event->gallery_folder) > 0)
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 py-8">
                
                <!-- Gallery Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($event->gallery_folder as $index => $image)
                        <div class="relative group cursor-pointer overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all duration-300"
                             onclick="openGalleryModal({{ $index }})">
                            <img src="{{ asset('storage/' . $image) }}"
                                 class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                            
                            <!-- Overlay with zoom icon -->
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/40 transition-all duration-300 flex items-center justify-center">
                                <svg class="w-8 h-8 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300" 
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Gallery Stats -->
                <div class="flex items-center justify-between mt-4 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ count($event->gallery_folder) }} photos from this event</span>
                    </div>
                    
                    <button class="text-teal-600 hover:text-teal-700 font-medium flex items-center gap-1">
                        <span>View All Photos</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- EVENT HEADER - Title and key info -->
    <div class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <!-- Breadcrumb -->
                    <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                        <a href="/" class="hover:text-teal-600">Home</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <a href="" class="hover:text-teal-600">Events</a>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-gray-700">{{ $event->title }}</span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        {{ $event->title }}
                    </h1>

                    <!-- Event Meta Tags -->
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="bg-teal-100 text-teal-700 px-4 py-1.5 rounded-full text-sm font-medium">
                            {{ $event->badge_text ?? 'Past Event' }}
                        </span>
                        
                        <span class="flex items-center gap-1 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y') }}</span>
                        </span>

                        <span class="flex items-center gap-1 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $event->location }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid md:grid-cols-3 gap-10">

            <!-- LEFT CONTENT - Event details and description -->
            <div class="md:col-span-2 space-y-8">

                <!-- Key Highlights (if any) -->
                @if($event->highlights && count($event->highlights) > 0)
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center gap-2">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            Event Highlights
                        </h2>
                        <ul class="space-y-3">
                            @foreach($event->highlights as $highlight)
                                <li class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-teal-600 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" 
                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" 
                                              clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">{{ $highlight }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Full Description -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center gap-2">
                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        About This Event
                    </h2>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </div>

                <!-- Tags -->
                @if($event->tags && count($event->tags) > 0)
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <h2 class="text-xl font-bold mb-4 text-gray-800 flex items-center gap-2">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l5 5a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-5-5A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Topics Covered
                        </h2>
                        <div class="flex flex-wrap gap-2">
                            @foreach($event->tags as $tag)
                                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-teal-50 hover:text-teal-700 transition-colors cursor-default">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- RIGHT SIDEBAR - Event stats and archive info -->
            <div class="space-y-6">

                <!-- Event Stats Card -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-lg font-bold mb-4 text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Event Archive
                    </h3>

                    <div class="space-y-4 text-gray-600 divide-y">
                        <div class="flex items-start gap-3 pb-3">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <div class="font-medium">Date</div>
                                <div>{{ \Carbon\Carbon::parse($event->event_date)->format('l, F d, Y') }}</div>
                                @if($event->event_end_date)
                                    <div class="text-sm text-gray-500">to {{ \Carbon\Carbon::parse($event->event_end_date)->format('l, F d, Y') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-start gap-3 py-3">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <div class="font-medium">Location</div>
                                <div>{{ $event->location }}</div>
                                @if(property_exists($event, 'venue') && $event->venue)
                                    <div class="text-sm text-gray-500">{{ $event->venue }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-start gap-3 py-3">
                            <svg class="w-5 h-5 text-teal-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            <div>
                                <div class="font-medium">Attendance</div>
                                <div class="text-2xl font-bold text-teal-600">{{ number_format($event->participant_count ?? 0) }}</div>
                                <div class="text-sm text-gray-500">{{ $event->participant_unit ?? 'participants' }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Organization Info -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-lg font-bold mb-4 text-gray-800 flex items-center gap-2">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                        </svg>
                        Organized By
                    </h3>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                            </svg>
                        </div>
                        <div>
                            <div class="font-medium text-gray-800">Smile Health Center</div>
                        </div>
                    </div>
                </div>

                <!-- Back to Events -->
                <a href="" 
                   class="block w-full text-center bg-gray-100 text-gray-700 py-3 rounded-lg hover:bg-gray-200 transition font-medium">
                    ← Back to All Events
                </a>

            </div>

        </div>
    </div>

    <!-- RELATED EVENTS -->
    @if($relatedEvents->count())
        <div class="bg-white py-16 mt-8 border-t">
            <div class="max-w-6xl mx-auto px-4">

                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                        More Events You Might Like
                    </h2>
                    <a href="" 
                       class="text-teal-600 hover:text-teal-700 font-medium flex items-center gap-2">
                        View All
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    @foreach($relatedEvents as $related)
                        <a href="{{ route('events.show', $related->slug) }}"
                           class="group bg-white rounded-xl shadow hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                            
                            <div class="h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $related->image_path) }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>

                            <div class="p-5">
                                <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                    <span class="bg-teal-50 text-teal-700 px-2 py-1 rounded-full">
                                        {{ $related->badge_text ?? 'Past Event' }}
                                    </span>
                                    <span>•</span>
                                    <span>{{ \Carbon\Carbon::parse($related->event_date)->format('M d, Y') }}</span>
                                </div>

                                <h3 class="font-semibold text-lg text-gray-800 mb-2 group-hover:text-teal-600 transition-colors line-clamp-2">
                                    {{ $related->title }}
                                </h3>

                                <p class="text-sm text-gray-500 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{ $related->location }}
                                </p>
                            </div>

                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    @endif

</div>

<!-- Gallery Modal (hidden by default) -->
<div id="galleryModal" class="fixed inset-0 bg-black/90 z-50 hidden" onclick="closeGalleryModal()">
    <div class="absolute top-4 right-4">
        <button onclick="closeGalleryModal()" class="text-white hover:text-gray-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    
    <div class="h-full flex items-center justify-center">
        <img id="modalImage" src="" class="max-h-[90vh] max-w-[90vw] object-contain">
    </div>
    
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-4">
        <button onclick="prevImage()" class="bg-white/20 hover:bg-white/30 text-white p-2 rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <span id="imageCounter" class="text-white bg-black/50 px-4 py-2 rounded-full"></span>
        <button onclick="nextImage()" class="bg-white/20 hover:bg-white/30 text-white p-2 rounded-full">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
</div>

<script>
    // Simple gallery modal functionality
    const galleryImages = @json($event->gallery_folder ?? []);
    let currentImageIndex = 0;

    function openGalleryModal(index) {
        currentImageIndex = index;
        updateModalImage();
        document.getElementById('galleryModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeGalleryModal() {
        document.getElementById('galleryModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    function updateModalImage() {
        const modal = document.getElementById('galleryModal');
        const img = document.getElementById('modalImage');
        const counter = document.getElementById('imageCounter');
        
        img.src = '{{ asset('storage/') }}/' + galleryImages[currentImageIndex];
        counter.textContent = (currentImageIndex + 1) + ' / ' + galleryImages.length;
    }

    function nextImage() {
        if (currentImageIndex < galleryImages.length - 1) {
            currentImageIndex++;
            updateModalImage();
        }
    }

    function prevImage() {
        if (currentImageIndex > 0) {
            currentImageIndex--;
            updateModalImage();
        }
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (!document.getElementById('galleryModal').classList.contains('hidden')) {
            if (e.key === 'Escape') closeGalleryModal();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        }
    });
</script>
</div>