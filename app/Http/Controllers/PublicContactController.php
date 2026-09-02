<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicContactRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;

class PublicContactController extends Controller
{
    public function store(PublicContactRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Message::query()->create([
            'user_id' => $request->user()?->id,
            'sender_name' => $data['name'],
            'sender_email' => $data['email'],
            'subject' => $data['subject'] ?? null,
            'contenu' => $data['message'],
        ]);

        return to_route('contact')->with('success', 'Votre message a bien été envoyé. Nous vous répondrons rapidement.');
    }
}
