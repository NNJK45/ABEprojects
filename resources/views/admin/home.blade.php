@extends('admin.layouts.app')
@section('title', 'Vue d’ensemble')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<main class="nk-content nk-content-fluid"><div class="container-xl wide-xl"><div class="nk-content-body">
    <section class="abe-dashboard-hero"><div><span class="abe-eyebrow">TABLEAU DE BORD</span><h1>Bonjour, {{ Str::before(auth()->user()->name, ' ') }}.</h1><p>Voici l’activité récente de l’Académie du Bien-Être.</p></div><div class="abe-hero-actions"><a class="btn btn-light" href="{{ route('admin.messages.index') }}"><em class="icon ni ni-mail"></em>Voir les messages</a><a class="btn btn-primary" href="{{ route('admin.actualites.create') }}"><em class="icon ni ni-plus"></em>Publier une actualité</a></div></section>
    <section class="abe-metrics-grid">
        <a href="{{ route('admin.programmes.index') }}" class="abe-metric-card"><span class="abe-metric-icon is-green"><em class="icon ni ni-book-fill"></em></span><span><strong>{{ $programmeCount }}</strong><small>Programmes</small></span><em class="icon ni ni-arrow-right"></em></a>
        <a href="{{ route('admin.evenements.index') }}" class="abe-metric-card"><span class="abe-metric-icon is-blue"><em class="icon ni ni-calendar-fill"></em></span><span><strong>{{ $evenementCount }}</strong><small>Événements</small></span><em class="icon ni ni-arrow-right"></em></a>
        <a href="{{ route('admin.actualites.index') }}" class="abe-metric-card"><span class="abe-metric-icon is-gold"><em class="icon ni ni-file-docs"></em></span><span><strong>{{ $actualiteCount }}</strong><small>Actualités</small></span><em class="icon ni ni-arrow-right"></em></a>
        <a href="{{ route('admin.messages.index') }}" class="abe-metric-card"><span class="abe-metric-icon is-purple"><em class="icon ni ni-mail-fill"></em></span><span><strong>{{ $messageCount }}</strong><small>Messages reçus</small></span><em class="icon ni ni-arrow-right"></em></a>
    </section>
    <div class="row g-gs mt-1">
        <div class="col-xl-7"><section class="abe-panel"><header><div><span class="abe-eyebrow">AGENDA</span><h2>Événements à venir</h2></div><a href="{{ route('admin.evenements.index') }}">Tout afficher</a></header><div class="abe-activity-list">@forelse($recentEvents as $event)<a href="{{ route('admin.evenements.edit', $event) }}" class="abe-activity"><time><strong>{{ $event->date->format('d') }}</strong><span>{{ mb_strtoupper($event->date->translatedFormat('M')) }}</span></time><span class="abe-activity-copy"><strong>{{ $event->titre }}</strong><small>{{ $event->lieu }}{{ $event->programme ? ' · '.$event->programme->nom : '' }}</small></span><em class="icon ni ni-chevron-right"></em></a>@empty<div class="abe-empty"><em class="icon ni ni-calendar"></em><p>Aucun événement planifié.</p><a href="{{ route('admin.evenements.create') }}">Créer un événement</a></div>@endforelse</div></section></div>
        <div class="col-xl-5"><section class="abe-panel"><header><div><span class="abe-eyebrow">CONTACTS</span><h2>Messages récents</h2></div><a href="{{ route('admin.messages.index') }}">Tout afficher</a></header><div class="abe-message-list">@forelse($recentMessages as $message)<a href="{{ route('admin.messages.show', $message) }}" class="abe-message"><span class="abe-message-avatar">{{ mb_strtoupper(mb_substr($message->user?->name ?? $message->sender_name ?? '?', 0, 1)) }}</span><span><strong>{{ $message->user?->name ?? $message->sender_name ?? 'Visiteur' }}</strong><small>{{ Str::limit($message->subject ?: $message->contenu, 48) }}</small></span><time>{{ $message->created_at->diffForHumans() }}</time></a>@empty<div class="abe-empty"><em class="icon ni ni-mail"></em><p>Aucun message reçu.</p></div>@endforelse</div></section></div>
    </div>
    <section class="abe-quick-actions">
        <header><span class="abe-eyebrow">ACCÈS RAPIDES</span><h2>Gérer la plateforme</h2></header>
        <div>
            <a href="{{ route('admin.images.index') }}"><em class="icon ni ni-img"></em><span><strong>Médiathèque</strong><small>{{ $imageCount }} images</small></span></a>
            @can('viewAny', App\Models\User::class)
                <a href="{{ route('admin.users.index') }}"><em class="icon ni ni-users"></em><span><strong>Équipe</strong><small>{{ $userCount }} comptes</small></span></a>
            @endcan
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.settings.edit') }}"><em class="icon ni ni-setting"></em><span><strong>Paramètres</strong><small>Identité et contact</small></span></a>
            @endif
        </div>
    </section>
</div></div></main>@include('admin.layouts.footer')</div>
@endsection
