<?php

use App\Http\Controllers\CanteenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormPdfController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WhatsNewController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircularController;
use App\Http\Controllers\QuickInfoController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::get('/forms-format', [FormPdfController::class, 'view'])->name('forms.view');

Route::get('/gallery', [ImageGalleryController::class, 'view'])->name('gallery.view');

Route::get('/canteen', [CanteenController::class, 'view'])->name('canteen.view');



require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Circulars
    Route::resource('circulars', CircularController::class);

    //Quick Info
    Route::resource('quick_infos', QuickInfoController::class);

    //What's New
    Route::resource('whats_new', WhatsNewController::class);

    //PDF Forms
    Route::resource('form_pdfs', FormPdfController::class);

    //Image Galley
    Route::resource('image_galleries', ImageGalleryController::class);

    //Canteen Info
    Route::resource('canteen_info', CanteenController::class);
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
