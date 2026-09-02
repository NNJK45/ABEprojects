<?php

use App\Http\Controllers\Admin\ActualiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EvenementController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');
    });

    Route::middleware(['auth', 'admin.access'])->name('admin.')->group(function () {
        Route::get('/', DashboardController::class)->name('home');
        Route::resource('programmes', ProgrammeController::class)->except('show');
        Route::resource('evenements', EvenementController::class)->except('show');
        Route::resource('actualites', ActualiteController::class)->except('show');
        Route::resource('images', ImageController::class)->except('show');
        Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
        Route::resource('users', UserController::class)->except('show');
        Route::get('settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');
        Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
        Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    });
});
