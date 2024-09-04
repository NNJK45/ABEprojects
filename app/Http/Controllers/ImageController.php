<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Evenement;
use \App\Models\Actualite;

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

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|string|max:255',
            'evenement_id' => 'nullable|exists:evenements,id',
            'actualite_id' => 'nullable|exists:actualites,id',
        ]);

        Image::create($request->all());

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
