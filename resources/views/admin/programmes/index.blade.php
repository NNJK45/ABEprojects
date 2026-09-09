@extends('admin.layouts.app')
@section('title', 'Programmes')
@section('body')
<div class="nk-wrap">
    @include('admin.layouts.header')
    <div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
        <div class="nk-block-head"><div class="nk-block-between">
            <h1 class="nk-block-title page-title">Programmes</h1>
            <a class="btn btn-primary" href="{{ route('admin.programmes.create') }}">Nouveau programme</a>
        </div></div>
        @include('admin.components.feedback')
        <form class="mb-3" method="GET"><div class="input-group">
            <input class="form-control" name="q" value="{{ $search }}" placeholder="Rechercher un programme">
            <div class="input-group-append"><button class="btn btn-outline-primary">Rechercher</button></div>
        </div></form>
        <div class="card card-bordered"><div class="card-inner p-0"><table class="table table-tranx">
            <thead><tr><th>Programme</th><th>Créé le</th><th class="text-right">Actions</th></tr></thead>
            <tbody>
            @forelse ($programmes as $programme)
                <tr><td><div class="abe-programme-cell"><span class="abe-programme-thumb">@if($programme->image_url)<img src="{{ $programme->image_url }}" alt="">@else<em class="icon ni ni-book"></em>@endif</span><span><strong>{{ $programme->nom }}</strong><small>{{ Str::limit($programme->description, 70) }}</small></span></div></td><td>{{ $programme->created_at->format('d/m/Y') }}</td><td class="text-right">
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.programmes.edit', $programme) }}">Modifier</a>
                    <form class="d-inline" method="POST" action="{{ route('admin.programmes.destroy', $programme) }}" onsubmit="return confirm('Supprimer ce programme ?')">
                        @csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Supprimer</button>
                    </form>
                </td></tr>
            @empty
                <tr><td colspan="3" class="text-center p-4">Aucun programme trouvé.</td></tr>
            @endforelse
            </tbody>
        </table></div></div>
        <div class="mt-3">{{ $programmes->links() }}</div>
    </div></div></div>
    @include('admin.layouts.footer')
</div>
@endsection
