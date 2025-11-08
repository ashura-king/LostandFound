<?php
use App\Http\Controllers\LostItemController;
use Illuminate\Support\Facades\Route;

// Routes that require login
Route::middleware(['auth'])->group(function () {
    Route::get('/', [LostItemController::class, 'index'])->name('lostItems.index');
    Route::get('/create', [LostItemController::class, 'create'])->name('lostItems.create');
    Route::post('/store', [LostItemController::class, 'store'])->name('lostItems.store');
    Route::get('/status/{id}/{status}', [LostItemController::class, 'updateStatus'])->name('lostItems.status');
});

// Optional dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Include auth routes installed by Breeze / Jetstream
require __DIR__.'/auth.php';