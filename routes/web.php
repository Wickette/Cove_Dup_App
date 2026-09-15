<?php

use App\Livewire\Coves\Index;
use App\Livewire\Coves\Show;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/coves', Index::class)
    ->middleware(['auth', 'verified'])
    ->name('coves.index');

Route::get('/coves/{cove}', Show::class)
    ->middleware(['auth', 'verified'])
    ->name('coves.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
