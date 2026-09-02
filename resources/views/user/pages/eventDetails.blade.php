@extends('user.layouts.app')
@section('title', $event->titre)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($event->description), 155))
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12"><h1>{{ $event->titre }}</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li><a href="{{ route('event') }}">Événements</a></li><li>{{ $event->titre }}</li></ul></div></div></div></div>
<section class="event-area section bg-white pt-120 pb-100"><div class="container"><div class="row"><article class="col-lg-8 col-12 mb-30">
    @if($event->image)<img class="mb-4" src="{{ $event->image }}" alt="{{ $event->titre }}">@endif
    <h2>{{ $event->titre }}</h2><p><strong>Date :</strong> {{ $event->date->format('d/m/Y') }}</p><p><strong>Lieu :</strong> {{ $event->lieu }}</p>@if($event->programme)<p><strong>Programme :</strong> <a href="{{ route('programme.details', $event->programme) }}">{{ $event->programme->nom }}</a></p>@endif
    <div style="white-space: pre-line">{{ $event->description }}</div>
    @if($event->images->isNotEmpty())<div class="row mt-4">@foreach($event->images as $image)<a href="{{ $image->url }}" class="gallery-item image-popup col-md-4"><img src="{{ $image->url }}" alt="{{ $event->titre }}" loading="lazy"></a>@endforeach</div>@endif
</article><aside class="col-lg-4 col-12"><div class="single-sidebar"><h3>Autres événements</h3>@forelse($autresEvenements as $autre)<div class="mb-20"><h4><a href="{{ route('event.details', $autre) }}">{{ $autre->titre }}</a></h4><p>{{ $autre->date->format('d/m/Y') }} — {{ $autre->lieu }}</p></div>@empty<p>Aucun autre événement.</p>@endforelse</div></aside></div><a href="{{ route('event') }}">Retour aux événements</a></div></section>
@endsection
