@extends('user.layouts.app')
@section('title', $event->titre)
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($event->description), 155))
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12"><h1>{{ $event->titre }}</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li><a href="{{ route('event') }}">Événements</a></li><li>{{ $event->titre }}</li></ul></div></div></div></div>
<section class="event-area section bg-white pt-120 pb-100"><div class="container"><div class="row"><article class="col-lg-8 col-12 mb-30">
    @if($event->image_url)<img class="mb-4" src="{{ $event->image_url }}" alt="{{ $event->titre }}">@endif
    <h2>{{ $event->titre }}</h2><p><strong>Date :</strong> {{ $event->date->format('d/m/Y') }}</p><p><strong>Lieu :</strong> {{ $event->lieu }}</p>@if($event->programme)<p><strong>Programme :</strong> <a href="{{ route('programme.details', $event->programme) }}">{{ $event->programme->nom }}</a></p>@endif
    <div style="white-space: pre-line">{{ $event->description }}</div>
    @if($event->images->isNotEmpty())<div class="row mt-4">@foreach($event->images as $image)<a href="{{ $image->image_url }}" class="gallery-item image-popup col-md-4"><img src="{{ $image->image_url }}" alt="{{ $event->titre }}" loading="lazy"></a>@endforeach</div>@endif
    <section class="abe-comment-form" aria-labelledby="comment-form-title"><span class="abe-kicker">PARTICIPER À LA CONVERSATION</span><h3 id="comment-form-title">Ajouter un commentaire</h3><p>Partagez une réaction ou une question à propos de cet événement.</p>
        @if(session('comment_success'))<div class="alert alert-success" role="status">{{ session('comment_success') }}</div>@endif
        @if($errors->any())<div class="alert alert-danger" role="alert"><strong>Votre commentaire n’a pas pu être envoyé.</strong><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('event.comments.store', $event) }}">@csrf
            <div class="form-group"><label for="author_name">Votre nom</label><input id="author_name" name="author_name" type="text" value="{{ old('author_name') }}" required minlength="2" maxlength="80" autocomplete="name"></div>
            <div class="form-group"><label for="contenu">Votre commentaire</label><textarea id="contenu" name="contenu" rows="5" required minlength="5" maxlength="1500" placeholder="Écrivez votre commentaire…">{{ old('contenu') }}</textarea></div>
            <div aria-hidden="true" class="abe-honeypot"><label for="website">Site web</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
            <button class="abe-btn abe-btn-primary" type="submit">Publier le commentaire</button>
        </form>
    </section>
</article><aside class="col-lg-4 col-12"><div class="single-sidebar"><h3>Autres événements</h3>@forelse($autresEvenements as $autre)<div class="mb-20"><h4><a href="{{ route('event.details', $autre) }}">{{ $autre->titre }}</a></h4><p>{{ $autre->date->format('d/m/Y') }} — {{ $autre->lieu }}</p></div>@empty<p>Aucun autre événement.</p>@endforelse</div>
    <section class="single-sidebar abe-comments-panel" id="commentaires" aria-labelledby="comments-title"><div class="abe-comments-heading"><h3 id="comments-title">Commentaires</h3><span>{{ $commentaires->total() }}</span></div>
        @forelse($commentaires as $commentaire)<article class="abe-comment"><div class="abe-comment-avatar">{{ mb_strtoupper(mb_substr($commentaire->author_name ?? 'V', 0, 1)) }}</div><div><header><strong>{{ $commentaire->author_name ?? 'Visiteur' }}</strong><time datetime="{{ $commentaire->created_at->toIso8601String() }}">{{ $commentaire->created_at->diffForHumans() }}</time></header><p>{{ $commentaire->contenu }}</p></div></article>@empty<div class="abe-comments-empty"><i class="fa fa-comments-o"></i><p>Aucun commentaire pour le moment.</p><small>Soyez la première personne à réagir.</small></div>@endforelse
        @if($commentaires->hasPages())<div class="abe-comments-pagination">{{ $commentaires->onEachSide(1)->links() }}</div>@endif
    </section>
</aside></div><a href="{{ route('event') }}">Retour aux événements</a></div></section>
@endsection
