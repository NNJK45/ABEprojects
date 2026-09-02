<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __invoke(): View
    {
        $images = Image::query()
            ->with(['evenement:id,titre', 'actualite:id,titre'])
            ->latest()
            ->paginate(12);

        return view('user.pages.gallery', compact('images'));
    }
}
