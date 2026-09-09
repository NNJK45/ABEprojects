<?php

namespace App\Http\Requests;

use App\Models\Programme;
use Illuminate\Foundation\Http\FormRequest;

class ProgrammeRequest extends FormRequest
{
    public function authorize(): bool
    {
        $programme = $this->route('programme');

        return $programme instanceof Programme
            ? $this->user()?->can('update', $programme) === true
            : $this->user()?->can('create', Programme::class) === true;
    }

    public function rules(): array
    {
        return [
            'nom' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gallery_images' => ['nullable', 'array', 'max:10'],
            'gallery_images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_gallery_images' => ['nullable', 'array'],
            'remove_gallery_images.*' => ['integer', 'exists:images,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Le fichier sélectionné doit être une image.',
            'image.mimes' => 'L’image doit être au format JPG, JPEG, PNG ou WebP.',
            'image.max' => 'L’image ne doit pas dépasser 5 Mo.',
            'gallery_images.max' => 'Vous pouvez importer au maximum 10 images à la fois.',
            'gallery_images.*.mimes' => 'Chaque image doit être au format JPG, JPEG, PNG ou WebP.',
            'gallery_images.*.max' => 'Chaque image ne doit pas dépasser 5 Mo.',
        ];
    }
}
