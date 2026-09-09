<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesMediaGallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\EvenementRequest;
use App\Models\Evenement;
use App\Models\Programme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EvenementController extends Controller
{
    use ManagesMediaGallery;

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
        $data = $request->safe()->except(['image_file', 'gallery_images', 'remove_gallery_images']);

        if ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('evenements', 'public');
        }

        $evenement = Evenement::query()->create($data);
        $this->storeGalleryImages($request, $evenement, 'evenements/gallery');

        return to_route('admin.evenements.index')->with('success', 'Événement créé.');
    }

    public function edit(Evenement $evenement): View
    {
        $evenement->load('images');

        return view('admin.evenements.edit', [
            'evenement' => $evenement,
            'programmes' => $this->programmes(),
        ]);
    }

    public function update(EvenementRequest $request, Evenement $evenement): RedirectResponse
    {
        $data = $request->safe()->except(['image_file', 'gallery_images', 'remove_gallery_images']);
        $previousImage = $evenement->image;

        if ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('evenements', 'public');
        }

        $evenement->update($data);
        $this->removeSelectedGalleryImages($request, $evenement);
        $this->storeGalleryImages($request, $evenement, 'evenements/gallery');

        if ($request->hasFile('image_file')) {
            $this->deleteLocalMedia($previousImage);
        }

        return to_route('admin.evenements.index')->with('success', 'Événement mis à jour.');
    }

    public function destroy(Evenement $evenement): RedirectResponse
    {
        $this->authorize('delete', $evenement);
        $image = $evenement->image;
        $this->deleteGalleryImages($evenement);
        $evenement->delete();
        $this->deleteLocalMedia($image);

        return to_route('admin.evenements.index')->with('success', 'Événement supprimé.');
    }

    private function programmes()
    {
        return Programme::query()->orderBy('nom')->get();
    }
}
