<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $images = Image::query()
            ->with(['evenement:id,nom', 'actualite:id,titre'])
            ->when($search, fn ($query) => $query->where('url', 'like', "%{$search}%"))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.images.index', compact('images', 'search'));
    }

    public function create(): View
    {
        return view('admin.images.create', $this->owners());
    }

    public function store(ImageRequest $request): RedirectResponse
    {
        Image::query()->create($request->validated());

        return to_route('admin.images.index')->with('success', 'Image ajoutée.');
    }

    public function edit(Image $image): View
    {
        return view('admin.images.edit', ['image' => $image, ...$this->owners()]);
    }

    public function update(ImageRequest $request, Image $image): RedirectResponse
    {
        $image->update(array_merge(
            ['evenement_id' => null, 'actualite_id' => null],
            $request->validated(),
        ));

        return to_route('admin.images.index')->with('success', 'Image mise à jour.');
    }

    public function destroy(Image $image): RedirectResponse
    {
        $this->authorize('delete', $image);
        $image->delete();

        return to_route('admin.images.index')->with('success', 'Image supprimée.');
    }

    private function owners(): array
    {
        return [
            'evenements' => Evenement::query()->orderBy('nom')->get(['id', 'nom']),
            'actualites' => Actualite::query()->orderBy('titre')->get(['id', 'titre']),
        ];
    }
}
