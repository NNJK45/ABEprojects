<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicEventCommentRequest;
use App\Models\Evenement;
use Illuminate\Http\RedirectResponse;

class PublicEventCommentController extends Controller
{
    public function store(PublicEventCommentRequest $request, Evenement $evenement): RedirectResponse
    {
        $evenement->commentaires()->create($request->safe()->only(['author_name', 'contenu']));

        return to_route('event.details', $evenement)
            ->withFragment('commentaires')
            ->with('comment_success', 'Merci ! Votre commentaire a bien été publié.');
    }
}
