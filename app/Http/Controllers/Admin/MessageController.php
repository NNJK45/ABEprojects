<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $messages = Message::query()
            ->with('user:id,name,email')
            ->when($search, fn ($query) => $query->where(function ($query) use ($search) {
                $query->where('contenu', 'like', "%{$search}%")
                    ->orWhereHas('user', fn ($query) => $query
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%"));
            }))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.messages.index', compact('messages', 'search'));
    }

    public function show(Message $message): View
    {
        $this->authorize('view', $message);

        return view('admin.messages.show', ['message' => $message->load('user')]);
    }

    public function destroy(Message $message): RedirectResponse
    {
        $this->authorize('delete', $message);
        $message->delete();

        return to_route('admin.messages.index')->with('success', 'Message supprimé.');
    }
}
