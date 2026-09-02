@extends('admin.layouts.app')
@section('title', 'Utilisateurs')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <div class="nk-block-head"><div class="nk-block-between"><h1 class="nk-block-title page-title">Utilisateurs</h1><a class="btn btn-primary" href="{{ route('admin.users.create') }}">Nouveau compte</a></div></div>
    @include('admin.components.feedback')
    <form class="mb-3" method="GET"><div class="input-group"><input class="form-control" name="q" value="{{ $search }}" placeholder="Rechercher par nom ou email"><div class="input-group-append"><button class="btn btn-outline-primary">Rechercher</button></div></div></form>
    <div class="card card-bordered"><div class="card-inner p-0"><table class="table table-tranx">
        <thead><tr><th>Nom</th><th>Email</th><th>Rôle</th><th class="text-right">Actions</th></tr></thead>
        <tbody>@forelse($users as $user)
            <tr><td>{{ $user->name }}</td><td>{{ $user->email }}</td><td><span class="badge badge-dim badge-primary">{{ $user->role->value }}</span></td>
                <td class="text-right"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.edit', $user) }}">Modifier</a>
                    <form class="d-inline" method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Supprimer ce compte ?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form>
                </td></tr>
        @empty<tr><td colspan="4" class="text-center p-4">Aucun utilisateur trouvé.</td></tr>@endforelse</tbody>
    </table></div></div><div class="mt-3">{{ $users->links() }}</div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
