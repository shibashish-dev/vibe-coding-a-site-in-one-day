<?php
use App\Http\Controllers\Auth\ProcurementAuthController;
use App\Http\Controllers\ProcurementTypeController;
use App\Http\Controllers\SectionController;
use App\Livewire\Auth\Procurement\Login;
use App\Livewire\Auth\Procurement\Register;

Route::prefix('procurement')->name('procurement.')->group(function () {
    Route::middleware('guest:procurement')->group(function () {
        Route::get('login', Login::class)->name('login');
        Route::get('register', Register::class)->name('register');

        Route::post('password/email', [ProcurementAuthController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::post('password/reset', [ProcurementAuthController::class, 'resetPassword'])->name('password.update');
    });

    Route::middleware('auth:procurement')->group(function () {
        Route::get('/dashboard', function () {
            $user = auth('procurement')->user();

            return $user->role === 'procurement_admin'
                ? view('procurement.admin')
                : view('procurement.user');
        })->name('dashboard');
        Route::post('logout', [ProcurementAuthController::class, 'logout'])->name('prologout');

        Route::resource('sections', SectionController::class);
        Route::resource('procurement-types', ProcurementTypeController::class);

    });
});