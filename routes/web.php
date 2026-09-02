<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/abe')->name('root');

require __DIR__.'/public.php';
require __DIR__.'/admin.php';
