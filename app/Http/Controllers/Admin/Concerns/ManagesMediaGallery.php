<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ManagesMediaGallery
{
    protected function storeGalleryImages(Request $request, Model $owner, string $directory): void
    {
        foreach ($request->file('gallery_images', []) as $file) {
            $owner->images()->create(['url' => $file->store($directory, 'public')]);
        }
    }

    protected function removeSelectedGalleryImages(Request $request, Model $owner): void
    {
        $ids = $request->input('remove_gallery_images', []);
        if ($ids === []) {
            return;
        }

        $owner->images()->whereKey($ids)->get()->each(function ($image): void {
            $this->deleteLocalMedia($image->url);
            $image->delete();
        });
    }

    protected function deleteGalleryImages(Model $owner): void
    {
        $owner->images()->get()->each(function ($image): void {
            $this->deleteLocalMedia($image->url);
            $image->delete();
        });
    }

    protected function deleteLocalMedia(?string $path): void
    {
        if ($path && ! Str::startsWith($path, ['http://', 'https://'])) {
            Storage::disk('public')->delete($path);
        }
    }
}
