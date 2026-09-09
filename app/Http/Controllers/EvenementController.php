<?php

namespace App\Http\Controllers;

use App\Http\Requests\EvenementRequest;
use App\Models\Evenement;

class EvenementController extends Controller
{
    //
    public function index()
    {
        $evenements = Evenement::query()
            ->with('programme')
            ->orderBy('date')
            ->orderBy('id')
            ->paginate(9);

        return view('user.pages.evenement', compact('evenements'));
    }

    public function create()
    {
        return view('evenements.create');
    }

    public function store(EvenementRequest $request)
    {
        Evenement::create($request->validated());

        return redirect()->route('event')->with('success', 'Événement créé avec succès');
    }

    public function show(Evenement $evenement)
    {
        $evenement->loadMissing(['programme', 'images']);
        $autresEvenements = Evenement::query()
            ->whereKeyNot($evenement->getKey())
            ->orderBy('date')
            ->limit(4)
            ->get();
        $commentaires = $evenement->commentaires()
            ->latest()
            ->paginate(5, ['*'], 'commentaires_page')
            ->withQueryString();

        return view('user.pages.eventDetails', compact('commentaires', 'autresEvenements') + ['event' => $evenement]);
    }

    public function edit(Evenement $evenement)
    {
        return view('evenements.edit', compact('evenement'));
    }

    public function update(EvenementRequest $request, Evenement $evenement)
    {
        $evenement->update($request->validated());

        return redirect()->route('event')->with('success', 'Événement mis à jour avec succès');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('event')->with('success', 'Événement supprimé avec succès');
    }
}
