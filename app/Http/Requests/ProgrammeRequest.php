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
        ];
    }
}
