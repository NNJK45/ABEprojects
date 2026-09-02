@extends('admin.layouts.app')
@section('title', 'Messages')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <h1 class="nk-block-title page-title mb-4">Messages</h1>
    @include('admin.components.feedback')
    <form class="mb-3" method="GET"><div class="input-group">
        <input class="form-control" name="q" value="{{ $search }}" placeholder="Rechercher par expéditeur ou contenu">
        <div class="input-group-append"><button class="btn btn-outline-primary">Rechercher</button></div>
    </div></form>
    <div class="card card-bordered"><div class="card-inner p-0"><table class="table table-tranx">
        <thead><tr><th>Expéditeur</th><th>Message</th><th>Date</th><th class="text-right">Actions</th></tr></thead>
        <tbody>@forelse($messages as $message)
            <tr><td>{{ $message->user?->name }}<br><small>{{ $message->user?->email }}</small></td>
                <td>{{ \Illuminate\Support\Str::limit($message->contenu, 80) }}</td><td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-right"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.messages.show', $message) }}">Lire</a>
                    <form class="d-inline" method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Supprimer ce message ?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
                </td></tr>
        @empty<tr><td colspan="4" class="text-center p-4">Aucun message trouvé.</td></tr>@endforelse</tbody>
    </table></div></div><div class="mt-3">{{ $messages->links() }}</div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
