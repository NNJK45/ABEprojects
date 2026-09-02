@extends('admin.layouts.app')
@section('title', 'Actualités')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <div class="nk-block-head"><div class="nk-block-between"><h1 class="nk-block-title page-title">Actualités</h1><a class="btn btn-primary" href="{{ route('admin.actualites.create') }}">Nouvelle actualité</a></div></div>
    @include('admin.components.feedback')
    <form class="mb-3" method="GET"><div class="input-group"><input class="form-control" name="q" value="{{ $search }}" placeholder="Rechercher une actualité"><div class="input-group-append"><button class="btn btn-outline-primary">Rechercher</button></div></div></form>
    <div class="card card-bordered"><div class="card-inner p-0"><table class="table table-tranx"><thead><tr><th>Titre</th><th>Publication</th><th class="text-right">Actions</th></tr></thead><tbody>
    @forelse ($actualites as $actualite)
        <tr><td>{{ $actualite->titre }}</td><td>{{ $actualite->date_publication->format('d/m/Y') }}</td><td class="text-right"><a class="btn btn-sm btn-outline-primary" href="{{ route('admin.actualites.edit', $actualite) }}">Modifier</a><form class="d-inline" method="POST" action="{{ route('admin.actualites.destroy', $actualite) }}" onsubmit="return confirm('Supprimer cette actualité ?')">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button></form></td></tr>
    @empty <tr><td colspan="3" class="text-center p-4">Aucune actualité trouvée.</td></tr> @endforelse
    </tbody></table></div></div><div class="mt-3">{{ $actualites->links() }}</div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
