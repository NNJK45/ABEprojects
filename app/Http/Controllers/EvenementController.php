<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use App\Models\Programme;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    //
    public function index()
    {
        $evenements = Evenement::all();
        return view('user.pages.evenement', compact('evenements'));
    }
    public function create()
    {
        return view('evenements.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'programme_id' => 'nullable|exists:programmes,id',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'lieu' => 'required|string|max:255',
            'date' => 'required|date',
            'année-event' => 'required|date_format:Y',
            'image' => 'required|string|max:255',
        ]);

        Evenement::create($request->all());

        return redirect()->route('evenements.index')->with('success', 'Événement créé avec succès');
    }

    public function show($id)
    {
        $event = Programme::findOrFail($id);
        return view('user.pages.eventDetails', compact('event'));
    }

    public function edit(Evenement $evenement)
    {
        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'programme_id' => 'nullable|exists:programmes,id',
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'lieu' => 'required|string|max:255',
            'date' => 'required|date',
            'année-event' => 'required|date_format:Y',
            'image' => 'required|string|max:255',
        ]);

        $evenement->update($request->all());

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour avec succès');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Événement supprimé avec succès');
    }
}
