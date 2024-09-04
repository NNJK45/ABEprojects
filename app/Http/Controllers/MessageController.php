<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //

    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'contenu' => 'required',
        ]);

        Message::create($request->all());

        return redirect()->route('messages.index')
            ->with('success', 'Message créé avec succès.');
    }

    public function edit(Message $message)
    {
        return view('messages.edit', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $request->validate([
            'user_id' => 'required',
            'contenu' => 'required',
        ]);

        $message->update($request->all());

        return redirect()->route('messages.index')
            ->with('success', 'Message mis à jour avec succès.');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Message supprimé avec succès.');
    }
}
