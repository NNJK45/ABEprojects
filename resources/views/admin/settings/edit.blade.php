@extends('admin.layouts.app')
@section('title', 'Paramètres du site')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <h1 class="nk-block-title page-title mb-4">Paramètres du site</h1>
    <div class="card card-bordered"><div class="card-inner"><form method="POST" action="{{ route('admin.settings.update') }}">@csrf @method('PUT')
        @include('admin.components.feedback')
        <div class="form-group"><label class="form-label" for="site_name">Nom du site</label><input class="form-control" id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name) }}" required></div>
        <div class="form-group"><label class="form-label" for="contact_email">Email de contact</label><input class="form-control" id="contact_email" name="contact_email" type="email" value="{{ old('contact_email', $setting->contact_email) }}"></div>
        <div class="form-group"><label class="form-label" for="contact_phone">Téléphone</label><input class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $setting->contact_phone) }}"></div>
        <div class="form-group"><label class="form-label" for="address">Adresse</label><textarea class="form-control" id="address" name="address" rows="4">{{ old('address', $setting->address) }}</textarea></div>
        <button class="btn btn-primary" type="submit">Enregistrer</button>
    </form></div></div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
