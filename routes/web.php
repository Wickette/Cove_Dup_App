<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/coves', \App\Livewire\Coves\Index::class)
    ->middleware(['auth', 'verified'])
    ->name('coves.index');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
