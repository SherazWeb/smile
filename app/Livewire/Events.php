<?php
// app/Livewire/EventsIndex.php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\DB;

class Events extends Component
{
    use WithPagination;

    // Properties for filtering
    public $selectedCategory = 'all';
    public $search = '';
    public $sortField = 'event_date';
    public $sortDirection = 'desc';
    
    // Stats properties
    public $totalWorkshops = 0;
    public $totalCamps = 0;
    public $totalParticipants = 0;
    public $totalPartners = 0;
    
    // Available categories
    public $categories = [];

    // Query string to maintain state in URL
    protected $queryString = [
        'selectedCategory' => ['as' => 'category', 'except' => 'all'],
        'search' => ['except' => ''],
        'sortField' => ['except' => 'event_date'],
        'sortDirection' => ['except' => 'desc'],
    ];

    /**
     * Initialize the component
     */
    public function mount()
    {
        $this->loadCategories();
        $this->loadStats();
    }

    /**
     * Load all categories with event counts
     */
    public function loadCategories()
    {
        $this->categories = EventCategory::withCount('events')
            ->orderBy('name')
            ->get()
            ->map(function($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'slug' => $category->slug ?? str_slug($category->name),
                    'events_count' => $category->events_count
                ];
            })
            ->toArray();
    }

    /**
     * Load statistics for the header
     * Updated to work with category_id instead of JSON
     */
    public function loadStats()
    {
        // Get workshop category ID
        $workshopCategory = EventCategory::where('name', 'like', '%workshop%')->first();
        $campCategory = EventCategory::where('name', 'like', '%camp%')->first();
        
        $this->totalWorkshops = $workshopCategory ? $workshopCategory->events()->count() : 0;
        $this->totalCamps = $campCategory ? $campCategory->events()->count() : 0;
        
        // If you want to count by badge_text instead
        if ($this->totalWorkshops === 0) {
            $this->totalWorkshops = Event::where('badge_text', 'like', '%workshop%')->count();
        }
        
        if ($this->totalCamps === 0) {
            $this->totalCamps = Event::where('badge_text', 'like', '%camp%')
                ->orWhere('badge_text', 'like', '%free%')
                ->count();
        }
        
        $this->totalParticipants = Event::sum('participant_count');
        $this->totalPartners = Event::where('participant_unit', 'companies')
            ->orWhere('participant_unit', 'partners')
            ->count();
    }

    /**
     * Get the filtered events with pagination
     */
    public function getEventsProperty()
    {
        $query = Event::with('category');

        // Apply category filter
        if ($this->selectedCategory !== 'all') {
            $category = EventCategory::where('slug', $this->selectedCategory)
                ->orWhere('name', $this->selectedCategory)
                ->first();
                
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('location', 'like', '%' . $this->search . '%');
                  
                // Search in tags JSON
                $q->orWhereJsonContains('tags', $this->search);
            });
        }

        // Apply sorting
        $query->orderBy($this->sortField, $this->sortDirection);

        return $query->paginate(9);
    }

    /**
     * Reset pagination when filters change
     */
    public function updatedSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    /**
     * Clear all filters
     */
    public function clearFilters()
    {
        $this->selectedCategory = 'all';
        $this->search = '';
        $this->sortField = 'event_date';
        $this->sortDirection = 'desc';
        $this->resetPage();
    }

    /**
     * Get the active category name
     */
    public function getActiveCategoryNameProperty()
    {
        if ($this->selectedCategory === 'all') {
            return 'All Events';
        }
        
        $category = collect($this->categories)->firstWhere('slug', $this->selectedCategory);
        return $category['name'] ?? 'Unknown Category';
    }

    /**
     * Render the component
     */
    public function render()
    {
        return view('livewire.events', [
            'events' => $this->events,
        ]);
    }
}