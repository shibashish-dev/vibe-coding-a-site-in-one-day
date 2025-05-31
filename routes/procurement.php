<?php
use App\Http\Controllers\Auth\ProcurementAuthController;
use App\Http\Controllers\ProcurementEntryController;
use App\Http\Controllers\ProcurementMultistepController;
use App\Http\Controllers\ProcurementTypeController;
use App\Http\Controllers\SectionController;
use App\Livewire\Auth\Procurement\Login;
use App\Livewire\Auth\Procurement\Register;
use App\Models\ProcurementEntry;

Route::prefix('procurement')->name('procurement.')->middleware('procurement.session')->group(function () {
    Route::middleware('guest:procurement')->group(function () {
        Route::get('login', Login::class)->name('login');
        Route::get('register', Register::class)->name('register');

        Route::post('password/email', [ProcurementAuthController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::post('password/reset', [ProcurementAuthController::class, 'resetPassword'])->name('password.update');
    });

    Route::middleware('auth:procurement')->group(function () {
        Route::get('/dashboard', function () {
            \Log::info('Procurement Dashboard: Web Auth', ['web' => Auth::guard('web')->check()]);
            \Log::info('Procurement Dashboard: Procurement Auth', ['procurement' => Auth::guard('procurement')->check()]);
            $user = auth('procurement')->user();

            $entries = $user->role === 'procurement_admin'
                ? ProcurementEntry::with(['user', 'section', 'procurementType'])
                    ->where('status', 'completed')
                    ->latest()
                    ->paginate(10)
                : ProcurementEntry::with(['section', 'procurementType'])
                    ->where('user_id', $user->id)
                    ->where('status', 'completed')
                    ->latest()
                    ->paginate(10);

            $view = $user->role === 'procurement_admin'
                ? 'procurement.admin'
                : 'procurement.user';

            return view($view, [
                'entries' => $entries,
                'swal' => session('swal')
            ]);
        })->name('dashboard');

        Route::delete('/entries/{entry}', [ProcurementEntryController::class, 'destroy'])
            ->name('entries.destroy');

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
        Route::post('gem-direct/{entry}', [ProcurementMultistepController::class, 'storeGem'])->name('gem.store');
        Route::post('indent-part-1/{entry}', [ProcurementMultistepController::class, 'storeIndentOne'])->name('indentOne.store');
        Route::post('indent-part-2/{entry}', [ProcurementMultistepController::class, 'storeIndentTwo'])->name('indentTwo.store');
        Route::post('indent-part-3/{entry}', [ProcurementMultistepController::class, 'storeIndentThree'])->name('indentThree.store');
        Route::post('pac/{entry}', [ProcurementMultistepController::class, 'storePac'])->name('pac.store');

        Route::get('preview/{entry}', [ProcurementMultistepController::class, 'preview'])
            ->name('preview');

        Route::post('preview/submit/{entry}', [ProcurementMultistepController::class, 'submitAndPrint'])
            ->name('preview.submit');

    });
});
