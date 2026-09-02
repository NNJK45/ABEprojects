@extends('admin.layouts.app')
@section('title', 'Modifier une image')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <h1 class="nk-block-title page-title mb-4">Modifier l’image</h1>
    <div class="card card-bordered"><div class="card-inner"><form method="POST" action="{{ route('admin.images.update', $image) }}">@csrf @method('PUT')
        @include('admin.images._form')
    </form></div></div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
