<?php

namespace App\Http\Requests;

use App\Models\Evenement;
use Illuminate\Foundation\Http\FormRequest;

class EvenementRequest extends FormRequest
{
    public function authorize(): bool
    {
        $evenement = $this->route('evenement');

        return $evenement instanceof Evenement
            ? $this->user()?->can('update', $evenement) === true
            : $this->user()?->can('create', Evenement::class) === true;
    }

    public function rules(): array
    {
        $isUpdate = $this->route('evenement') instanceof Evenement;

        return [
            'programme_id' => ['nullable', 'exists:programmes,id'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'lieu' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'annee_event' => ['required', 'integer', 'digits:4'],
            'image' => ['nullable', 'url', 'max:255'],
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
            'image_file.image' => 'Le fichier sélectionné doit être une image.',
            'image_file.mimes' => 'L’image doit être au format JPG, JPEG, PNG ou WebP.',
            'image_file.max' => 'L’image ne doit pas dépasser 5 Mo.',
            'image_file.required_without' => 'Veuillez sélectionner une image pour l’événement.',
            'gallery_images.max' => 'Vous pouvez importer au maximum 10 images à la fois.',
            'gallery_images.*.mimes' => 'Chaque image doit être au format JPG, JPEG, PNG ou WebP.',
            'gallery_images.*.max' => 'Chaque image ne doit pas dépasser 5 Mo.',
        ];
    }
}
