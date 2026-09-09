<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        $image = $this->route('image');

        return $image instanceof Image
            ? $this->user()?->can('update', $image) === true
            : $this->user()?->can('create', Image::class) === true;
    }

    public function rules(): array
    {
        $isUpdate = $this->route('image') instanceof Image;

        return [
            'url' => [$isUpdate ? 'nullable' : 'required_without:image_file', 'nullable', 'string', 'max:255'],
            'image_file' => [$isUpdate ? 'nullable' : 'required_without:url', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'programme_id' => [
                'nullable',
                'required_without_all:evenement_id,actualite_id',
                'prohibits:evenement_id,actualite_id',
                'exists:programmes,id',
            ],
            'evenement_id' => [
                'nullable',
                'required_without_all:programme_id,actualite_id',
                'prohibits:programme_id,actualite_id',
                'exists:evenements,id',
            ],
            'actualite_id' => [
                'nullable',
                'required_without_all:programme_id,evenement_id',
                'prohibits:programme_id,evenement_id',
                'exists:actualites,id',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'image_file.required_without' => 'Veuillez sélectionner une image.',
            'image_file.image' => 'Le fichier sélectionné doit être une image.',
            'image_file.mimes' => 'L’image doit être au format JPG, JPEG, PNG ou WebP.',
            'image_file.max' => 'L’image ne doit pas dépasser 5 Mo.',
        ];
    }
}
