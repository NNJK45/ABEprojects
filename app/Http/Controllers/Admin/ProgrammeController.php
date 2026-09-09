<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesMediaGallery;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgrammeRequest;
use App\Models\Programme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgrammeController extends Controller
{
    use ManagesMediaGallery;

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
        $data = $request->safe()->except(['image', 'gallery_images', 'remove_gallery_images']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programmes', 'public');
        }

        $programme = Programme::query()->create($data);
        $this->storeGalleryImages($request, $programme, 'programmes/gallery');

        return to_route('admin.programmes.index')->with('success', 'Programme créé.');
    }

    public function edit(Programme $programme): View
    {
        $programme->load('images');

        return view('admin.programmes.edit', compact('programme'));
    }

    public function update(ProgrammeRequest $request, Programme $programme): RedirectResponse
    {
        $data = $request->safe()->except(['image', 'gallery_images', 'remove_gallery_images']);
        $previousImage = $programme->image;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('programmes', 'public');
        }

        $programme->update($data);
        $this->removeSelectedGalleryImages($request, $programme);
        $this->storeGalleryImages($request, $programme, 'programmes/gallery');

        if (isset($data['image']) && $previousImage) {
            $this->deleteLocalMedia($previousImage);
        }

        return to_route('admin.programmes.index')->with('success', 'Programme mis à jour.');
    }

    public function destroy(Programme $programme): RedirectResponse
    {
        $this->authorize('delete', $programme);
        $image = $programme->image;
        $this->deleteGalleryImages($programme);
        $programme->delete();
        $this->deleteLocalMedia($image);

        return to_route('admin.programmes.index')->with('success', 'Programme supprimé.');
    }
}
