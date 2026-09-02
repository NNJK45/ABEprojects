<?php

namespace App\Http\Requests;

use App\Models\Message;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        $message = $this->route('message');

        return $message instanceof Message
            ? $this->user()?->can('update', $message) === true
            : $this->user()?->can('create', Message::class) === true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'contenu' => ['required', 'string'],
        ];
    }
}
