<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'url' => ['required', 'string', 'max:255'],
            'evenement_id' => [
                'nullable',
                'required_without:actualite_id',
                'prohibits:actualite_id',
                'exists:evenements,id',
            ],
            'actualite_id' => [
                'nullable',
                'required_without:evenement_id',
                'prohibits:evenement_id',
                'exists:actualites,id',
            ],
        ];
    }
}
