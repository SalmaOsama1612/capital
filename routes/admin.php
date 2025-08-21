<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminDashboardController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->get('/login', fn () => redirect()->route('login'))->name('login');

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});
