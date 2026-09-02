<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgrammeRequest;
use App\Models\Programme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgrammeController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $programmes = Programme::query()
            ->when($search, fn ($query) => $query->where('nom', 'like', "%{$search}%"))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.programmes.index', compact('programmes', 'search'));
    }

    public function create(): View
    {
        return view('admin.programmes.create');
    }

    public function store(ProgrammeRequest $request): RedirectResponse
    {
        Programme::query()->create($request->validated());

        return to_route('admin.programmes.index')->with('success', 'Programme créé.');
    }

    public function edit(Programme $programme): View
    {
        return view('admin.programmes.edit', compact('programme'));
    }

    public function update(ProgrammeRequest $request, Programme $programme): RedirectResponse
    {
        $programme->update($request->validated());

        return to_route('admin.programmes.index')->with('success', 'Programme mis à jour.');
    }

    public function destroy(Programme $programme): RedirectResponse
    {
        $this->authorize('delete', $programme);
        $programme->delete();

        return to_route('admin.programmes.index')->with('success', 'Programme supprimé.');
    }
}
