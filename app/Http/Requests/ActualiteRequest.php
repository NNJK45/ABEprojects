<?php

namespace App\Http\Requests;

use App\Models\Actualite;
use Illuminate\Foundation\Http\FormRequest;

class ActualiteRequest extends FormRequest
{
    public function authorize(): bool
    {
        $actualite = $this->route('actualite');

        return $actualite instanceof Actualite
            ? $this->user()?->can('update', $actualite) === true
            : $this->user()?->can('create', Actualite::class) === true;
    }

    public function rules(): array
    {
        $isUpdate = $this->route('actualite') instanceof Actualite;

        return [
            'titre' => ['required', 'string', 'max:255'],
            'contenu' => ['required', 'string'],
            'date_publication' => ['required', 'date'],
            'image' => [$isUpdate ? 'nullable' : 'required_without:image_file', 'nullable', 'url', 'max:255'],
            'image_file' => [$isUpdate ? 'nullable' : 'required_without:image', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'gallery_images' => ['nullable', 'array', 'max:10'],
            'gallery_images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'remove_gallery_images' => ['nullable', 'array'],
            'remove_gallery_images.*' => ['integer', 'exists:images,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'image_file.required_without' => 'Veuillez sélectionner une image pour l’actualité.',
            'image_file.image' => 'Le fichier sélectionné doit être une image.',
            'image_file.mimes' => 'L’image doit être au format JPG, JPEG, PNG ou WebP.',
            'image_file.max' => 'L’image ne doit pas dépasser 5 Mo.',
            'gallery_images.max' => 'Vous pouvez importer au maximum 10 images à la fois.',
            'gallery_images.*.mimes' => 'Chaque image doit être au format JPG, JPEG, PNG ou WebP.',
            'gallery_images.*.max' => 'Chaque image ne doit pas dépasser 5 Mo.',
        ];
    }
}
