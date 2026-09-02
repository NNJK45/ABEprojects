<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ActualiteRequest;
use App\Models\Actualite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActualiteController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $actualites = Actualite::query()
            ->when($search, fn ($query) => $query->where('titre', 'like', "%{$search}%"))
            ->latest('date_publication')
            ->paginate(15)
            ->withQueryString();

        return view('admin.actualites.index', compact('actualites', 'search'));
    }

    public function create(): View
    {
        return view('admin.actualites.create');
    }

    public function store(ActualiteRequest $request): RedirectResponse
    {
        Actualite::query()->create($request->validated());

        return to_route('admin.actualites.index')->with('success', 'Actualité créée.');
    }

    public function edit(Actualite $actualite): View
    {
        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $actualite->update($request->validated());

        return to_route('admin.actualites.index')->with('success', 'Actualité mise à jour.');
    }

    public function destroy(Actualite $actualite): RedirectResponse
    {
        $this->authorize('delete', $actualite);
        $actualite->delete();

        return to_route('admin.actualites.index')->with('success', 'Actualité supprimée.');
    }
}
