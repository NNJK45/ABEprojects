<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicEventCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'author_name' => ['required', 'string', 'min:2', 'max:80'],
            'contenu' => ['required', 'string', 'min:5', 'max:1500'],
            'website' => ['nullable', 'max:0'],
        ];
    }

    public function attributes(): array
    {
        return ['author_name' => 'nom', 'contenu' => 'commentaire'];
    }
}
