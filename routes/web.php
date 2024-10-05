<?php

use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\EvenementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgrammeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


// Route::get('/admin', function() {
//     return view('/pages/AdminPages/home');
// } );

Route::get('/contact', function () {
    return view('pages/contact');
})->name('contact');

Route::get('/gallery', function () {
    return view('pages/gallery');
})->name('gallery');

//Route::get('/news', function () {
  //  return view('pages/news');
//})->name('news');

Route::get('/newsDetail', function () {
    return view('pages/newsDetail');
})->name('newsDetail');

//Route::get('/event', function () {
 //   return view('pages/evenement');
//})->name('event');

Route::get('/about', function () {
    return view('/pages/about');
})->name('about');

Route::get('/programme', [ProgrammeController::class, 'index'])->name('programme');
Route::get('/programme/{id}', [ProgrammeController::class, 'show'])->name('programme.details');
Route::get('/event', [EvenementController::class, 'index'])->name('event');
Route::get('/event/{id}', [EvenementController::class, 'show'])->name('event.details');
Route::get('/actualite', [ActualiteController::class, 'index'])->name('news');