@extends('user.layouts.app')
@section('title', $actualite->titre)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($actualite->contenu), 155))
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12">
    <h1>{{ $actualite->titre }}</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li><a href="{{ route('news') }}">Actualités</a></li><li>{{ $actualite->titre }}</li></ul>
</div></div></div></div>
<div class="news-area bg-white section pt-120 pb-70"><div class="container"><div class="row">
    <div class="col-xl-9 col-lg-8 col-12 mb-20"><article class="single-news-details">
        <img class="mb-4" src="{{ $actualite->image }}" alt="{{ $actualite->titre }}">
        <div class="content"><h2 class="title">{{ $actualite->titre }}</h2>
            <div class="news-meta fix"><span><i class="zmdi zmdi-calendar-check"></i>{{ $actualite->date_publication->format('d/m/Y') }}</span></div>
            <div style="white-space: pre-line">{{ $actualite->contenu }}</div>
        </div>
        @if($actualite->images->isNotEmpty())<div class="row mt-4">@foreach($actualite->images as $image)<a href="{{ $image->url }}" class="gallery-item image-popup col-md-4"><img src="{{ $image->url }}" alt="{{ $actualite->titre }}" loading="lazy"></a>@endforeach</div>@endif
    </article></div>
    <aside class="col-xl-3 col-lg-4 col-12"><div class="single-sidebar"><h4 class="title">Actualités récentes</h4><div class="recent-news">
        @forelse($recentes as $recente)<div class="recent-news-item"><a class="image" href="{{ route('news.details', $recente) }}"><img src="{{ $recente->image }}" alt="{{ $recente->titre }}" loading="lazy"></a><div class="content"><h5><a href="{{ route('news.details', $recente) }}">{{ $recente->titre }}</a></h5><p>{{ \Illuminate\Support\Str::limit($recente->contenu, 80) }}</p></div></div>@empty<p>Aucune autre actualité.</p>@endforelse
    </div></div></aside>
</div></div></div>
@endsection
