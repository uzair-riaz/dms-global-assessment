<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard at root
    Route::get('/', [PostController::class, 'index'])->name('home');
    
    // Posts resource routes excluding index (which is now handled by the root route)
    Route::resource('posts', PostController::class)->except(['index']);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
