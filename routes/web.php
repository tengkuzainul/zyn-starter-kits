<?php

use App\Livewire\Pages\Admin\Dashboard;
use App\Livewire\Pages\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');

Route::middleware(['auth'])->group(function () {
          Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

require __DIR__ . '/auth.php';
