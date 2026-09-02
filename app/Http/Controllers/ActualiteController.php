<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActualiteRequest;
use App\Models\Actualite;

class ActualiteController extends Controller
{
    //
    public function index()
    {
        $actualites = Actualite::query()
            ->latest('date_publication')
            ->latest('id')
            ->paginate(9);

        return view('user.pages.news', compact('actualites'));
    }

    public function create()
    {
        return view('actualites.create');
    }

    public function store(ActualiteRequest $request)
    {
        Actualite::create($request->validated());

        return redirect()->route('news')->with('success', 'Actualité créée avec succès');
    }

    public function show(Actualite $actualite)
    {
        return view('actualites.show', compact('actualite'));
    }

    public function edit(Actualite $actualite)
    {
        return view('actualites.edit', compact('actualite'));
    }

    public function update(ActualiteRequest $request, Actualite $actualite)
    {
        $actualite->update($request->validated());

        return redirect()->route('news')->with('success', 'Actualité mise à jour avec succès');
    }

    public function destroy(Actualite $actualite)
    {
        $actualite->delete();

        return redirect()->route('news')->with('success', 'Actualité supprimée avec succès');
    }
}
