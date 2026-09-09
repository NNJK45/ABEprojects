<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\PublicContactController;
use App\Http\Controllers\PublicEventCommentController;
use Illuminate\Support\Facades\Route;

Route::prefix('abe')->group(function () {
    Route::get('/', HomeController::class)->name('home');
    Route::view('/contact', 'user.pages.contact')->name('contact');
    Route::post('/contact', [PublicContactController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('contact.store');
    Route::get('/gallery', GalleryController::class)->name('gallery');
    Route::view('/about', 'user.pages.about')->name('about');

    Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme');
    Route::get('/programme/{programme}', [ProgrammeController::class, 'show'])
        ->whereNumber('programme')
        ->name('programme.details');

    Route::get('/event', [EvenementController::class, 'index'])->name('event');
    Route::get('/event/{evenement}', [EvenementController::class, 'show'])
        ->whereNumber('evenement')
        ->name('event.details');
    Route::post('/event/{evenement}/commentaires', [PublicEventCommentController::class, 'store'])
        ->whereNumber('evenement')
        ->middleware('throttle:3,1')
        ->name('event.comments.store');

    Route::get('/actualite', [ActualiteController::class, 'index'])->name('news');
    Route::get('/actualite/{actualite}', [ActualiteController::class, 'show'])
        ->whereNumber('actualite')
        ->name('news.details');
});
