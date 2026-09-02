<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Programme;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('user.home', [
            'programmes' => Programme::query()->latest()->limit(3)->get(),
            'evenements' => Evenement::query()->orderBy('date')->limit(3)->get(),
            'actualites' => Actualite::query()->latest('date_publication')->limit(3)->get(),
            'images' => Image::query()->latest()->limit(8)->get(),
        ]);
    }
}
