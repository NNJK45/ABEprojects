<?php

namespace App\Http\Requests;

use App\Models\Commentaire;
use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
{
    public function authorize(): bool
    {
        $commentaire = $this->route('commentaire');

        return $commentaire instanceof Commentaire
            ? $this->user()?->can('update', $commentaire) === true
            : $this->user()?->can('create', Commentaire::class) === true;
    }

    public function rules(): array
    {
        return [
            'evenement_id' => ['required', 'exists:evenements,id'],
            'contenu' => ['required', 'string'],
        ];
    }
}
