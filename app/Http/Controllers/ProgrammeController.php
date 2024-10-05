<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    //

    public function index()
    {
        $programmes = Programme::all();
        return view('user.pages.programme', compact('programmes'));
    }
    public function create()
    {
        return view('programmes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Programme::create($request->all());

        return redirect()->route('programmes.index')->with('success', 'Programme créé avec succès');
    }

    public function show($id)
    {
        $programme = Programme::findOrFail($id);
        return view('user.pages.programmeDetail', compact('programme'));
    }

    public function edit(Programme $programme)
    {
        return view('programmes.edit', compact('programme'));
    }

    public function update(Request $request, Programme $programme)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $programme->update($request->all());

        return redirect()->route('programmes.index')->with('success', 'Programme mis à jour avec succès');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();

        return redirect()->route('programmes.index')->with('success', 'Programme supprimé avec succès');
    }
}
