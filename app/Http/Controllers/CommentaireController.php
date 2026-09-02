<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentaireRequest;
use App\Models\Commentaire;
use App\Models\Evenement;

class CommentaireController extends Controller
{
    //
    public function index()
    {
        $commentaires = Commentaire::with('evenement')->get();

        return view('commentaires.index', compact('commentaires'));
    }

    public function create()
    {
        $evenements = Evenement::all();

        return view('commentaires.create', compact('evenements'));
    }

    public function store(CommentaireRequest $request)
    {
        Commentaire::create($request->validated());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire créé avec succès');
    }

    public function show(Commentaire $commentaire)
    {
        return view('commentaires.show', compact('commentaire'));
    }

    public function edit(Commentaire $commentaire)
    {
        $evenements = Evenement::all();

        return view('commentaires.edit', compact('commentaire', 'evenements'));
    }

    public function update(CommentaireRequest $request, Commentaire $commentaire)
    {
        $commentaire->update($request->validated());

        return redirect()->route('commentaires.index')->with('success', 'Commentaire mis à jour avec succès');
    }

    public function destroy(Commentaire $commentaire)
    {
        $commentaire->delete();

        return redirect()->route('commentaires.index')->with('success', 'Commentaire supprimé avec succès');
    }
}
