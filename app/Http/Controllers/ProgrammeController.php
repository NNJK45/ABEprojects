<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProgrammeRequest;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    //

    public function index()
    {
        $programmes = Programme::query()
            ->latest()
            ->latest('id')
            ->paginate(9);

        return view('user.pages.programme', compact('programmes'));
    }

    public function create()
    {
        return view('programmes.create');
    }

    public function store(ProgrammeRequest $request)
    {
        Programme::create($request->validated());

        return redirect()->route('programme')->with('success', 'Programme créé avec succès');
    }

    public function show(Programme $programme)
    {
        $programme->loadMissing(['evenements', 'images']);

        return view('user.pages.programmeDetail', compact('programme'));
    }

    public function edit(Programme $programme)
    {
        return view('programmes.edit', compact('programme'));
    }

    public function update(ProgrammeRequest $request, Programme $programme)
    {
        $programme->update($request->validated());

        return redirect()->route('programme')->with('success', 'Programme mis à jour avec succès');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();

        return redirect()->route('programme')->with('success', 'Programme supprimé avec succès');
    }
}
