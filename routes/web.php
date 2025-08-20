<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;

// جروبات الأدمن
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');
        // Route::resource('users', AdminUserController::class);
    });

// الصفحة الرئيسية
Route::get('/', function () {
    return view('welcome');
})->name('home');

// /dashboard العامة
Route::get('/dashboard', function () {
    // لو أدمن حوّله للوحة تحكم الأدمن
    if (auth()->user()?->is_admin) {
        return redirect()->route('admin.dashboard');
    }

    // لو عندك صفحة للمستخدم العادي اسمها resources/views/dashboard.blade.php
    if (view()->exists('dashboard')) {
        return view('dashboard');
    }

    // مؤقتًا لو الصفحة غير موجودة، رجّع welcome بدل ما يرمي خطأ
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

// بروفايل
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
