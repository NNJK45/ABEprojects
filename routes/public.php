<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ProgrammeController;
use Illuminate\Support\Facades\Route;

Route::prefix('abe')->group(function () {
    Route::view('/', 'user.home')->name('home');
    Route::view('/contact', 'user.pages.contact')->name('contact');
    Route::view('/gallery', 'user.pages.gallery')->name('gallery');
    Route::view('/newsDetail', 'user.pages.newsDetail')->name('newsDetail');
    Route::view('/about', 'user.pages.about')->name('about');

    Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme');
    Route::get('/programme/{programme}', [ProgrammeController::class, 'show'])
        ->whereNumber('programme')
        ->name('programme.details');

    Route::get('/event', [EvenementController::class, 'index'])->name('event');
    Route::get('/event/{evenement}', [EvenementController::class, 'show'])
        ->whereNumber('evenement')
        ->name('event.details');

    Route::get('/actualite', [ActualiteController::class, 'index'])->name('news');
});
