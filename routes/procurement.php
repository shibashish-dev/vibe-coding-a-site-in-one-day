<?php
use App\Http\Controllers\Auth\ProcurementAuthController;
use App\Http\Controllers\ProcurementEntryController;
use App\Http\Controllers\ProcurementMultistepController;
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

        /** New Procurement Entry */
        Route::get('/new', [ProcurementEntryController::class, 'create'])->name('new');
        Route::post('/new', [ProcurementEntryController::class, 'store'])->name('new.store');
        Route::get('/user-details/{id}', [ProcurementEntryController::class, 'getUserDetails'])->name('user.details');

        /**Multistep Form */
        Route::get('/multistep/start/{entry}', [ProcurementMultistepController::class, 'start'])->name('multistep.start');
        Route::post('/multistep/save', [ProcurementMultistepController::class, 'store'])->name('multistep.final-save');

        /** Form Partials */
        Route::post('vec/{entry}', [ProcurementMultistepController::class, 'storeVec'])->name('vec.store');
        Route::post('gem-direct/{entry}', [ProcurementMultistepController::class, 'storeGemDirect'])->name('gem.store');
        Route::post('indent-part-1/{entry}', [ProcurementMultistepController::class, 'storeIndent1'])->name('indent1.store');
        Route::post('indent-part-2/{entry}', [ProcurementMultistepController::class, 'storeIndent2'])->name('indent2.store');
        Route::post('indent-part-3/{entry}', [ProcurementMultistepController::class, 'storeIndent3'])->name('indent3.store');
        Route::post('pac/{entry}', [ProcurementMultistepController::class, 'storePac'])->name('pac.store');
    });
});