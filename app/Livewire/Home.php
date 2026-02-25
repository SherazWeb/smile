<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventCategory;

class Home extends Component
{
    public $events;
    public $categories;

    public function mount()
    {
        // Load latest events with category
        $this->events = Event::with('category')
            ->latest('event_date')
            ->take(6)
            ->get();

        // Load categories that actually have events
        $this->categories = EventCategory::whereHas('events')->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}