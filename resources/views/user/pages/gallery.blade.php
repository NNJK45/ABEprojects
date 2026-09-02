@extends('user.layouts.app')
@section('title', 'Galerie')
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12">
    <h1>Galerie de photos</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li>Galerie</li></ul>
</div></div></div></div>
<div class="gallery-area section bg-white pt-120 pb-120"><div class="container">
    <div class="row">
        @forelse($images as $image)
            @php($label = $image->evenement?->titre ?? $image->actualite?->titre ?? 'Activité ABE')
            <a href="{{ $image->url }}" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12">
                <img src="{{ $image->url }}" alt="{{ $label }}" loading="lazy">
            </a>
        @empty
            <div class="col-12 text-center"><p>Aucune image n’est disponible pour le moment.</p></div>
        @endforelse
    </div>
    <div class="mt-4">{{ $images->links() }}</div>
</div></div>
@endsection
