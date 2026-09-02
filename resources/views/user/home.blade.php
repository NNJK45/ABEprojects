@extends('user.layouts.app')
@section('title', 'Accueil')
@section('content')
<section class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12">
    <h1>Académie du Bien-Être</h1><p>Accompagner, former et favoriser l’inclusion des personnes défavorisées.</p><a class="btn" href="{{ route('programme') }}">Découvrir nos programmes</a>
</div></div></div></section>

<section class="about-area section bg-white pt-120 pb-100"><div class="container"><div class="row align-items-center">
    <div class="col-lg-6 col-12 mb-30"><img src="/assets/img/about/about.jpg" alt="Actions de l’Académie du Bien-Être"></div>
    <div class="col-lg-6 col-12 mb-30"><h2>Agir pour le bien-être et l’autonomie</h2><p>L’Académie du Bien-Être développe des initiatives d’accompagnement, d’éducation et de mobilisation communautaire au service des personnes vulnérables.</p><p>Découvrez nos actions, suivez nos événements et contactez notre équipe pour participer ou proposer un partenariat.</p><a href="{{ route('about') }}">En savoir plus</a></div>
</div></div></section>

<section class="course-area section bg-gray pt-120 pb-90"><div class="container"><div class="section-title text-center mb-60"><h3>Nos programmes</h3></div><div class="row">
    @forelse($programmes as $programme)<div class="col-lg-4 col-md-6 col-12 mb-30"><article class="card h-100"><div class="card-body"><h3><a href="{{ route('programme.details', $programme) }}">{{ $programme->nom }}</a></h3><p>{{ \Illuminate\Support\Str::limit($programme->description, 160) }}</p><a href="{{ route('programme.details', $programme) }}">Voir le programme</a></div></article></div>@empty<div class="col-12 text-center"><p>Nos programmes seront bientôt publiés.</p></div>@endforelse
</div><div class="text-center"><a href="{{ route('programme') }}">Tous les programmes</a></div></div></section>

<section class="event-area section bg-white pt-120 pb-90"><div class="container"><div class="section-title text-center mb-60"><h3>Prochains événements</h3></div><div class="row">
    @forelse($evenements as $evenement)<div class="col-lg-4 col-md-6 col-12 mb-30"><article class="card h-100">@if($evenement->image)<img src="{{ $evenement->image }}" alt="{{ $evenement->titre }}" loading="lazy">@endif<div class="card-body"><h3><a href="{{ route('event.details', $evenement) }}">{{ $evenement->titre }}</a></h3><p>{{ $evenement->date->format('d/m/Y') }} — {{ $evenement->lieu }}</p><p>{{ \Illuminate\Support\Str::limit($evenement->description, 120) }}</p></div></article></div>@empty<div class="col-12 text-center"><p>Aucun événement n’est programmé pour le moment.</p></div>@endforelse
</div></div></section>

@if($images->isNotEmpty())<section class="gallery-area section bg-gray pt-120 pb-90"><div class="container"><div class="section-title text-center mb-60"><h3>Nos actions en images</h3></div><div class="row">@foreach($images as $image)<a href="{{ $image->url }}" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="{{ $image->url }}" alt="Activité de l’Académie du Bien-Être" loading="lazy"></a>@endforeach</div><div class="text-center mt-4"><a href="{{ route('gallery') }}">Voir toute la galerie</a></div></div></section>@endif

<section class="news-area section bg-white pt-120 pb-90"><div class="container"><div class="section-title text-center mb-60"><h3>Dernières actualités</h3></div><div class="row">
    @forelse($actualites as $actualite)<div class="col-lg-4 col-md-6 col-12 mb-30"><article class="news-item"><div class="image"><img src="{{ $actualite->image }}" alt="{{ $actualite->titre }}" loading="lazy"></div><div class="content"><h3><a href="{{ route('news.details', $actualite) }}">{{ $actualite->titre }}</a></h3><p>{{ \Illuminate\Support\Str::limit($actualite->contenu, 140) }}</p></div></article></div>@empty<div class="col-12 text-center"><p>Aucune actualité n’est publiée pour le moment.</p></div>@endforelse
</div></div></section>

<section class="section bg-gray pt-80 pb-80"><div class="container text-center"><h2>Vous souhaitez échanger avec l’ABE ?</h2><p>Notre équipe est disponible pour répondre à vos questions et étudier les propositions de collaboration.</p><a class="btn" href="{{ route('contact') }}">Nous contacter</a></div></section>
@endsection
