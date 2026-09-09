<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesMediaGallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActualiteRequest;
use App\Models\Actualite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActualiteController extends Controller
{
    use ManagesMediaGallery;

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
        $data = $request->safe()->except(['image_file', 'gallery_images', 'remove_gallery_images']);

        if ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('actualites', 'public');
        }

        $actualite = Actualite::query()->create($data);
        $this->storeGalleryImages($request, $actualite, 'actualites/gallery');

        return to_route('admin.actualites.index')->with('success', 'Actualité créée.');
    }

    public function edit(Actualite $actualite): View
    {
        $actualite->load('images');

        return view('admin.actualites.edit', compact('actualite'));
    }

    public function update(ActualiteRequest $request, Actualite $actualite): RedirectResponse
    {
        $data = $request->safe()->except(['image_file', 'gallery_images', 'remove_gallery_images']);
        $previousImage = $actualite->image;

        if ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('actualites', 'public');
        }

        $actualite->update($data);
        $this->removeSelectedGalleryImages($request, $actualite);
        $this->storeGalleryImages($request, $actualite, 'actualites/gallery');

        if ($request->hasFile('image_file')) {
            $this->deleteLocalMedia($previousImage);
        }

        return to_route('admin.actualites.index')->with('success', 'Actualité mise à jour.');
    }

    public function destroy(Actualite $actualite): RedirectResponse
    {
        $this->authorize('delete', $actualite);
        $image = $actualite->image;
        $this->deleteGalleryImages($actualite);
        $actualite->delete();
        $this->deleteLocalMedia($image);

        return to_route('admin.actualites.index')->with('success', 'Actualité supprimée.');
    }
}
