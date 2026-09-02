@extends('admin.layouts.app')
@section('title', 'Événements')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <div class="nk-block-head"><div class="nk-block-between"><h1 class="nk-block-title page-title">Événements</h1><a class="btn btn-primary" href="{{ route('admin.evenements.create') }}">Nouvel événement</a></div></div>
    @include('admin.components.feedback')
    <form class="mb-3" method="GET"><div class="input-group"><input class="form-control" name="q" value="{{ $search }}" placeholder="Titre ou lieu"><div class="input-group-append"><button class="btn btn-outline-primary">Rechercher</button></div></div></form>
    <div class="card card-bordered"><div class="card-inner p-0"><table class="table table-tranx"><thead><tr><th>Titre</th><th>Date</th><th>Lieu</th><th>Programme</th><th class="text-right">Actions</th></tr></thead><tbody>
    @forelse ($evenements as $evenement)
        <tr><td>{{ $evenement->titre }}</td><td>{{ $evenement->date->format('d/m/Y') }}</td><td>{{ $evenement->lieu }}</td><td>{{ $evenement->programme?->nom ?? '—' }}</td><td class="text-right">
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.evenements.edit', $evenement) }}">Modifier</a>
            <form class="d-inline" method="POST" action="{{ route('admin.evenements.destroy', $evenement) }}" onsubmit="return confirm('Supprimer cet événement ?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
        </td></tr>
    @empty <tr><td colspan="5" class="text-center p-4">Aucun événement trouvé.</td></tr> @endforelse
    </tbody></table></div></div><div class="mt-3">{{ $evenements->links() }}</div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
