<?php

use App\Http\Controllers\WhatsNewController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircularController;
use App\Http\Controllers\QuickInfoController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

//Circulars
Route::resource('circulars', CircularController::class);

//Quick Info
Route::resource('quick_infos', QuickInfoController::class);

//What's New
Route::resource('whats_new', WhatsNewController::class);

require __DIR__ . '/auth.php';
