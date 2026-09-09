<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Concerns\ManagesMediaGallery;
use App\Http\Requests\ImageRequest;
use App\Models\Actualite;
use App\Models\Evenement;
use App\Models\Image;
use App\Models\Programme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ImageController extends Controller
{
    use ManagesMediaGallery;

    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $images = Image::query()
            ->with(['programme:id,nom', 'evenement:id,titre', 'actualite:id,titre'])
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
        $data = $request->safe()->except('image_file');

        if ($request->hasFile('image_file')) {
            $data['url'] = $this->storeOptimizedImage($request->file('image_file'), 'mediatheque');
        }

        Image::query()->create($data);

        return to_route('admin.images.index')->with('success', 'Image ajoutée.');
    }

    public function edit(Image $image): View
    {
        return view('admin.images.edit', ['image' => $image, ...$this->owners()]);
    }

    public function update(ImageRequest $request, Image $image): RedirectResponse
    {
        $data = $request->safe()->except('image_file');
        $previousFile = $image->url;

        if ($request->hasFile('image_file')) {
            $data['url'] = $this->storeOptimizedImage($request->file('image_file'), 'mediatheque');
        }

        $image->update(array_merge(
            ['programme_id' => null, 'evenement_id' => null, 'actualite_id' => null],
            $data,
        ));

        if ($request->hasFile('image_file')) {
            $this->deleteLocalImage($previousFile);
        }

        return to_route('admin.images.index')->with('success', 'Image mise à jour.');
    }

    public function destroy(Image $image): RedirectResponse
    {
        $this->authorize('delete', $image);
        $file = $image->url;
        $image->delete();
        $this->deleteLocalImage($file);

        return to_route('admin.images.index')->with('success', 'Image supprimée.');
    }

    private function owners(): array
    {
        return [
            'programmes' => Programme::query()->orderBy('nom')->get(['id', 'nom']),
            'evenements' => Evenement::query()->orderBy('titre')->get(['id', 'titre']),
            'actualites' => Actualite::query()->orderBy('titre')->get(['id', 'titre']),
        ];
    }

    private function deleteLocalImage(?string $file): void
    {
        if ($file && ! Str::startsWith($file, ['http://', 'https://'])) {
            Storage::disk('public')->delete($file);
        }
    }
}
