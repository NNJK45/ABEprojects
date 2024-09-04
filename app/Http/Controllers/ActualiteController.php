<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    //
    public function index()
    {
        $actualites = Actualite::all();
        return view('pages.news', compact('actualites'));
    }

    public function create()
    {
        return view('actualites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'date_publication' => 'required|date',
            'image' => 'required|string|max:255',
        ]);

        Actualite::create($request->all());

        return redirect()->route('actualites.index')->with('success', 'Actualité créée avec succès');
    }

    public function show(Actualite $actualite)
    {
        return view('actualites.show', compact('actualite'));
    }

    public function edit(Actualite $actualite)
    {
        return view('actualites.edit', compact('actualite'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'contenu' => 'required|string',
            'date_publication' => 'required|date',
            'image' => 'required|string|max:255',
        ]);

        $actualite->update($request->all());

        return redirect()->route('actualites.index')->with('success', 'Actualité mise à jour avec succès');
    }

    public function destroy(Actualite $actualite)
    {
        $actualite->delete();

        return redirect()->route('actualites.index')->with('success', 'Actualité supprimée avec succès');
    }
}
