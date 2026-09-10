<?php

namespace App\Http\Controllers\Admin\Concerns;

use Cloudinary\Cloudinary;
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
        if (config('services.cloudinary.url')) {
            return $this->storeOnCloudinary($file, $directory);
        }

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

        if (! $saved) {
            return $file->store($directory, 'public');
        }

        return $path;
    }

    protected function storeOnCloudinary(UploadedFile $file, string $directory): string
    {
        $result = (new Cloudinary(config('services.cloudinary.url')))->uploadApi()->upload(
            $file->getRealPath(),
            [
                'folder' => 'abe/'.trim($directory, '/'),
                'resource_type' => 'image',
                'unique_filename' => true,
                'overwrite' => false,
                'format' => 'webp',
                'transformation' => [
                    'width' => 1920,
                    'height' => 1920,
                    'crop' => 'limit',
                    'quality' => 'auto:good',
                ],
            ],
        );

        return (string) $result['secure_url'];
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
        if (! $path) {
            return;
        }

        if (Str::contains($path, 'res.cloudinary.com') && config('services.cloudinary.url')) {
            $publicId = $this->cloudinaryPublicId($path);
            if ($publicId) {
                (new Cloudinary(config('services.cloudinary.url')))->uploadApi()->destroy($publicId, [
                    'invalidate' => true,
                    'resource_type' => 'image',
                ]);
            }

            return;
        }

        if (! Str::startsWith($path, ['http://', 'https://'])) {
            Storage::disk('public')->delete($path);
        }
    }

    private function cloudinaryPublicId(string $url): ?string
    {
        $path = (string) parse_url($url, PHP_URL_PATH);

        return preg_match('~/image/upload/(?:v\d+/)?(.+)\.[^.]+$~', $path, $matches)
            ? urldecode($matches[1])
            : null;
    }
}
