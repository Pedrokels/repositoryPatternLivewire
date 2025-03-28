<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TaskManager;
use App\Livewire\UserComponent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', UserComponent::class)->name('usercomp');
