<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EvenementRequest;
use App\Models\Evenement;
use App\Models\Programme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvenementController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $evenements = Evenement::query()
            ->with('programme')
            ->when($search, fn ($query) => $query->where(function ($query) use ($search) {
                $query->where('titre', 'like', "%{$search}%")
                    ->orWhere('lieu', 'like', "%{$search}%");
            }))
            ->orderByDesc('date')
            ->paginate(15)
            ->withQueryString();

        return view('admin.evenements.index', compact('evenements', 'search'));
    }

    public function create(): View
    {
        return view('admin.evenements.create', ['programmes' => $this->programmes()]);
    }

    public function store(EvenementRequest $request): RedirectResponse
    {
        Evenement::query()->create($request->validated());

        return to_route('admin.evenements.index')->with('success', 'Événement créé.');
    }

    public function edit(Evenement $evenement): View
    {
        return view('admin.evenements.edit', [
            'evenement' => $evenement,
            'programmes' => $this->programmes(),
        ]);
    }

    public function update(EvenementRequest $request, Evenement $evenement): RedirectResponse
    {
        $evenement->update($request->validated());

        return to_route('admin.evenements.index')->with('success', 'Événement mis à jour.');
    }

    public function destroy(Evenement $evenement): RedirectResponse
    {
        $this->authorize('delete', $evenement);
        $evenement->delete();

        return to_route('admin.evenements.index')->with('success', 'Événement supprimé.');
    }

    private function programmes()
    {
        return Programme::query()->orderBy('nom')->get();
    }
}
