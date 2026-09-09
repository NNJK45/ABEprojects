<?php

namespace App\Http\Controllers\Admin\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ManagesMediaGallery
{
    protected function storeGalleryImages(Request $request, Model $owner, string $directory): void
    {
        foreach ($request->file('gallery_images', []) as $file) {
            $owner->images()->create(['url' => $this->storeOptimizedImage($file, $directory)]);
        }
    }

    protected function storeOptimizedImage(UploadedFile $file, string $directory): string
    {
        if (! function_exists('imagecreatefromstring') || ! function_exists('imagewebp')) {
            return $file->store($directory, 'public');
        }

        $contents = file_get_contents($file->getRealPath());
        $source = $contents === false ? false : @imagecreatefromstring($contents);

        if ($source === false) {
            return $file->store($directory, 'public');
        }

        $width = imagesx($source);
        $height = imagesy($source);
        $maxDimension = 1920;
        $scale = min(1, $maxDimension / max($width, $height));
        $targetWidth = max(1, (int) round($width * $scale));
        $targetHeight = max(1, (int) round($height * $scale));
        $target = imagecreatetruecolor($targetWidth, $targetHeight);

        imagealphablending($target, false);
        imagesavealpha($target, true);
        imagecopyresampled($target, $source, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

        $path = trim($directory, '/').'/'.Str::uuid().'.webp';
        Storage::disk('public')->makeDirectory($directory);
        $saved = imagewebp($target, Storage::disk('public')->path($path), 82);

        imagedestroy($target);
        imagedestroy($source);

        return $saved ? $path : $file->store($directory, 'public');
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
