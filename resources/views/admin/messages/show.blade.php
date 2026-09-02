@extends('admin.layouts.app')
@section('title', 'Lire le message')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <h1 class="nk-block-title page-title mb-4">Message</h1>
    <div class="card card-bordered"><div class="card-inner">
        <dl><dt>Expéditeur</dt><dd>{{ $message->user?->name ?? $message->sender_name }} — {{ $message->user?->email ?? $message->sender_email }}</dd>@if($message->subject)<dt>Objet</dt><dd>{{ $message->subject }}</dd>@endif<dt>Reçu le</dt><dd>{{ $message->created_at->format('d/m/Y à H:i') }}</dd></dl>
        <div class="border rounded p-3 mb-4" style="white-space: pre-wrap">{{ $message->contenu }}</div>
        <a class="btn btn-light" href="{{ route('admin.messages.index') }}">Retour</a>
        <form class="d-inline" method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Supprimer ce message ?')">@csrf @method('DELETE')<button class="btn btn-outline-danger">Supprimer</button></form>
    </div></div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
