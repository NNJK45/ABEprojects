@extends('admin.layouts.app')
@section('title', 'Médiathèque')
@section('body')
<div class="nk-wrap">
    @include('admin.layouts.header')
    <div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
        <div class="nk-block-head"><div class="nk-block-between">
            <h1 class="nk-block-title page-title">Médiathèque</h1>
            <a class="btn btn-primary" href="{{ route('admin.images.create') }}">Ajouter une image</a>
        </div></div>
        @include('admin.components.feedback')
        <form class="mb-3" method="GET"><div class="input-group">
            <input class="form-control" name="q" value="{{ $search }}" placeholder="Rechercher une image">
            <div class="input-group-append"><button class="btn btn-outline-primary">Rechercher</button></div>
        </div></form>
        <div class="card card-bordered"><div class="card-inner p-0"><table class="table table-tranx">
            <thead><tr><th>Aperçu</th><th>Rattachement</th><th>URL</th><th class="text-right">Actions</th></tr></thead>
            <tbody>
            @forelse ($images as $image)
                <tr>
                    <td><img src="{{ $image->image_url }}" alt="" width="72" height="48" style="object-fit: cover; border-radius: 8px"></td>
                    <td>{{ $image->programme?->nom ?? $image->evenement?->titre ?? $image->actualite?->titre }}</td>
                    <td class="text-break">{{ basename($image->url) }}</td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.images.edit', $image) }}">Modifier</a>
                        <form class="d-inline" method="POST" action="{{ route('admin.images.destroy', $image) }}" onsubmit="return confirm('Supprimer cette image ?')">
                            @csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center p-4">Aucune image trouvée.</td></tr>
            @endforelse
            </tbody>
        </table></div></div>
        <div class="mt-3">{{ $images->links() }}</div>
    </div></div></div>
    @include('admin.layouts.footer')
</div>
@endsection
