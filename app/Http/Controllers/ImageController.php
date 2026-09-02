<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;

class ImageController extends Controller
{
    //
    public function index()
    {
        $images = Image::with(['evenement', 'actualite'])->get();

        return view('images.index', compact('images'));
    }

    public function create()
    {
        $evenements = Evenement::all();
        $actualites = Actualite::all();

        return view('images.create', compact('evenements', 'actualites'));
    }

    public function store(ImageRequest $request)
    {
        Image::create($request->validated());

        return redirect()->route('images.index')->with('success', 'Image créée avec succès');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function destroy(Image $image)
    {
        $image->delete();

        return redirect()->route('images.index')->with('success', 'Image supprimée avec succès');
    }
}
