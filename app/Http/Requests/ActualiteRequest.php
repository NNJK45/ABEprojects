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
        return [
            'titre' => ['required', 'string', 'max:255'],
            'contenu' => ['required', 'string'],
            'date_publication' => ['required', 'date'],
            'image' => ['required', 'string', 'max:255'],
        ];
    }
}
