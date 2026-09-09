@extends('admin.layouts.app')
@section('title', 'Ajouter une image')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')
<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <h1 class="nk-block-title page-title mb-4">Ajouter une image</h1>
    <div class="card card-bordered"><div class="card-inner"><form method="POST" action="{{ route('admin.images.store') }}" enctype="multipart/form-data">@csrf
        @include('admin.images._form', ['image' => null])
    </form></div></div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
