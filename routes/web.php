<?php

use App\Livewire\AcademicServices;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::get('/academic-services', AcademicServices::class);

Route::get('/profile', function(){
    return view('profile');
}); 
