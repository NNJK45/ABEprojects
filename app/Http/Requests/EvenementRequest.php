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
        return [
            'programme_id' => ['nullable', 'exists:programmes,id'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'lieu' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'annee_event' => ['required', 'integer', 'digits:4'],
            'image' => ['required', 'string', 'max:255'],
        ];
    }
}
