@extends('user.layouts.app')
@section('title', $programme->nom)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($programme->description), 155))
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12"><h1>{{ $programme->nom }}</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li><a href="{{ route('programme') }}">Programmes</a></li><li>{{ $programme->nom }}</li></ul></div></div></div></div>
<section class="section bg-white pt-120 pb-100"><div class="container"><div class="row g-5">
    <article class="col-lg-8 col-12 mb-30">
        @if($programme->image_url)<img class="abe-detail-cover" src="{{ $programme->image_url }}" alt="{{ $programme->nom }}">@endif
        <span class="abe-kicker">PROGRAMME ABE</span><h2>{{ $programme->nom }}</h2>
        <div class="abe-prose" style="white-space: pre-line">{{ $programme->description }}</div>
        @if($programme->images->isNotEmpty())<div class="row mt-4">@foreach($programme->images as $image)<a href="{{ $image->image_url }}" class="gallery-item image-popup col-md-4"><img src="{{ $image->image_url }}" alt="{{ $programme->nom }}" loading="lazy"></a>@endforeach</div>@endif
        <a class="abe-text-link mt-4" href="{{ route('contact') }}">Nous contacter à propos de ce programme <i class="fa fa-arrow-right"></i></a>
    </article>
    <aside class="col-lg-4 col-12"><div class="single-sidebar"><h3>Événements du programme</h3>@forelse($programme->evenements->sortBy('date') as $evenement)<div class="abe-sidebar-event"><span>{{ $evenement->date->format('d/m/Y') }}</span><h4><a href="{{ route('event.details', $evenement) }}">{{ $evenement->titre }}</a></h4><p>{{ $evenement->lieu }}</p></div>@empty<p>Aucun événement associé pour le moment.</p>@endforelse</div></aside>
</div><a class="abe-back-link" href="{{ route('programme') }}"><i class="fa fa-arrow-left"></i> Retour aux programmes</a></div></section>
@endsection
