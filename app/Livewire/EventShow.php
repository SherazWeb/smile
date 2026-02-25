<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventShow extends Component
{
    public $event;
    public $relatedEvents;

    public function mount($slug)
    {
        $this->event = Event::with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        // Related events (same category, exclude current)
        $this->relatedEvents = Event::where('category_id', $this->event->category_id)
            ->where('id', '!=', $this->event->id)
            ->latest()
            ->take(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.event-show');
    }
}