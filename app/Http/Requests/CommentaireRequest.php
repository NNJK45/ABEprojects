<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'evenement_id' => ['required', 'exists:evenements,id'],
            'contenu' => ['required', 'string'],
        ];
    }
}
