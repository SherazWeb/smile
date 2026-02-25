{{-- resources/views/livewire/events-index.blade.php --}}
<div class="bg-gray-50 min-h-screen py-20">

    <!-- Page Header with Stats -->
    <section class="bg-gradient-to-br from-teal-600 to-teal-700 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Events & Community Impact</h1>
                <p class="text-xl text-teal-100 max-w-3xl mx-auto">
                    Discover how we're making a difference through workshops, health camps, and community programs
                </p>
            </div>

            <!-- Impact Stats Summary -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto">
                <div class="text-center" wire:loading.class="opacity-50">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $totalWorkshops }}+</div>
                    <div class="text-teal-100">Workshops Conducted</div>
                </div>
                <div class="text-center" wire:loading.class="opacity-50">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $totalCamps }}+</div>
                    <div class="text-teal-100">Free Health Camps</div>
                </div>
                <div class="text-center" wire:loading.class="opacity-50">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ number_format($totalParticipants) }}+</div>
                    <div class="text-teal-100">Community Members</div>
                </div>
                <div class="text-center" wire:loading.class="opacity-50">
                    <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $totalPartners }}+</div>
                    <div class="text-teal-100">Partner Organizations</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">

            <!-- Filter Bar -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-10">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">All Events & Activities</h2>
                    <p class="text-gray-600">Browse through our past events and community initiatives</p>
                </div>

                <!-- Search -->
                <div class="relative" wire:ignore>
                    <input type="text" 
                           wire:model.live.debounce.300ms="search"
                           placeholder="Search events..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent w-full md:w-64">
                    <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    
                    @if($search)
                        <button wire:click="$set('search', '')" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    @endif
                </div>
            </div>

            <!-- Category Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-8">
                <button wire:click="$set('selectedCategory', 'all')"
                    wire:loading.attr="disabled"
                    class="px-6 py-3 rounded-full font-medium transition-all duration-300 
                        {{ $selectedCategory === 'all' 
                            ? 'bg-teal-600 text-white shadow-lg scale-105' 
                            : 'bg-gray-100 text-gray-700 hover:bg-teal-50' }}">
                    All Events
                </button>

                @foreach ($categories as $category)
                    <button wire:click="$set('selectedCategory', '{{ $category['slug'] }}')"
                        wire:loading.attr="disabled"
                        class="px-6 py-3 rounded-full font-medium transition-all duration-300 relative
                            {{ $selectedCategory === $category['slug'] 
                                ? 'bg-teal-600 text-white shadow-lg scale-105' 
                                : 'bg-gray-100 text-gray-700 hover:bg-teal-50' }}">
                        {{ $category['name'] }}
                        @if($category['events_count'] > 0)
                            <span class="absolute -top-2 -right-2 bg-teal-500 text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">
                                {{ $category['events_count'] }}
                            </span>
                        @endif
                    </button>
                @endforeach
            </div>

            <!-- Active Filter Indicator -->
            @if($selectedCategory !== 'all' || $search)
                <div class="flex flex-wrap items-center justify-center gap-3 mb-6">
                    <span class="inline-flex items-center gap-2 bg-teal-50 text-teal-700 px-4 py-2 rounded-full">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                        </svg>
                        Showing: <span class="font-semibold">{{ $this->activeCategoryName }}</span>
                        @if($search)
                            <span>• Search: "{{ $search }}"</span>
                        @endif
                    </span>
                    
                    <button wire:click="clearFilters" 
                            class="text-sm text-gray-500 hover:text-teal-600 underline">
                        Clear all filters
                    </button>
                </div>
            @endif

            <!-- Loading Indicator -->
            <div wire:loading.flex class="justify-center mb-8">
                <div class="flex items-center gap-2 bg-teal-50 text-teal-700 px-4 py-2 rounded-full">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Loading events...</span>
                </div>
            </div>

            <!-- Events Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($events as $event)
                    <div wire:key="event-{{ $event->id }}"
                         wire:loading.class="opacity-50"
                         class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                        
                        <!-- Image -->
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $event->image_path) }}" 
                                 alt="{{ $event->title }}"
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">
                            
                            <!-- Badge -->
                            <div class="absolute top-4 right-4 bg-teal-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                {{ $event->badge_text }}
                            </div>
                            
                            <!-- Date Badge -->
                            <div class="absolute bottom-4 left-4 bg-black/70 text-white px-3 py-1 rounded-full text-sm backdrop-blur-sm">
                                {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            
                            <!-- Location -->
                            <div class="flex items-center gap-1 text-gray-500 text-sm mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $event->location }}</span>
                            </div>
                            
                            <!-- Title -->
                            <h3 class="text-xl font-bold text-gray-800 mb-2 hover:text-teal-600 transition-colors">
                                <a href="{{ route('events.show', $event->slug) }}">
                                    {{ $event->title }}
                                </a>
                            </h3>
                            
                            <!-- Description -->
                            <p class="text-gray-600 mb-4 line-clamp-2">
                                {{ Str::limit($event->description, 100) }}
                            </p>
                            
                            <!-- Tags -->
                            @if ($event->tags)
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach (array_slice($event->tags, 0, 2) as $tag)
                                        <span class="bg-teal-50 text-teal-700 px-2 py-1 rounded-full text-xs">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                    @if(count($event->tags) > 2)
                                        <span class="text-xs text-gray-500">+{{ count($event->tags) - 2 }} more</span>
                                    @endif
                                </div>
                            @endif
                            
                            <!-- Footer -->
                            <div class="border-t pt-4 flex items-center justify-between">
                                
                                <!-- Participants -->
                                <div class="flex items-center gap-1 text-sm text-gray-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <span>{{ number_format($event->participant_count ?? 0) }} {{ $event->participant_unit }}</span>
                                </div>
                                
                                <!-- View Link -->
                                <a href="{{ route('events.show', $event->slug) }}" 
                                   class="text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center gap-1 group">
                                    View Details
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">No Events Found</h3>
                        <p class="text-gray-500">Try adjusting your filters or check back later.</p>
                        
                        @if($selectedCategory !== 'all' || $search)
                            <button wire:click="clearFilters" 
                                    class="mt-4 text-teal-600 hover:text-teal-700 font-medium">
                                Clear all filters
                            </button>
                        @endif
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $events->links() }}
            </div>

            <!-- Partnership CTA -->
            <div class="mt-16 bg-gradient-to-r from-teal-50 to-blue-50 rounded-2xl p-8 md:p-12">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                    <div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">Partner With Us</h3>
                        <p class="text-gray-600 max-w-2xl">
                            Interested in collaborating for community wellness programs? Let's create meaningful impact together.
                        </p>
                    </div>
                    <a href="mailto:smilehealthclinic.info@gmail.com?subject=Partnership Inquiry&body=Hello Smile Health Clinic,%0D%0A%0D%0AI am interested in becoming a partner.%0D%0A%0D%0AThank you."
                        class="bg-teal-600 cursor-pointer text-white px-8 py-4 rounded-full font-semibold hover:bg-teal-700 transition-colors whitespace-nowrap inline-block text-center">
                        Become a Partner
                    </a>
                </div>
            </div>

        </div>
    </section>

</div>