<?php

use App\Livewire\AcademicServices;
use App\Livewire\Events;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\EventShow;

Route::get('/', Home::class);

Route::get('/events', Events::class)->name('events.index');

Route::get('/academic-services', AcademicServices::class);

Route::get('/profile', function(){
    return view('profile');
}); 

Route::get('/events/{slug}', EventShow::class)
    ->name('events.show');