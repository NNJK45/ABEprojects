<?php

use App\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/abe')->name('root');
Route::get('/health', HealthController::class)->name('health');

require __DIR__.'/public.php';
require __DIR__.'/admin.php';
