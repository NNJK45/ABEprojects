@extends('user.layouts.app')
@section('title', $programme->nom)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($programme->description), 155))
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12"><h1>{{ $programme->nom }}</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li><a href="{{ route('programme') }}">Programmes</a></li><li>{{ $programme->nom }}</li></ul></div></div></div></div>
<section class="section bg-white pt-120 pb-100"><div class="container"><div class="row"><article class="col-lg-8 col-12 mb-30"><h2>{{ $programme->nom }}</h2><div style="white-space: pre-line">{{ $programme->description }}</div></article><aside class="col-lg-4 col-12"><div class="single-sidebar"><h3>Événements du programme</h3>@forelse($programme->evenements->sortBy('date') as $evenement)<div class="mb-20"><h4><a href="{{ route('event.details', $evenement) }}">{{ $evenement->titre }}</a></h4><p>{{ $evenement->date->format('d/m/Y') }} — {{ $evenement->lieu }}</p></div>@empty<p>Aucun événement associé pour le moment.</p>@endforelse</div></aside></div><a href="{{ route('programme') }}">Retour aux programmes</a></div></section>
@endsection
