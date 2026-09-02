@extends('admin.layouts.app')
@section('title', 'Nouveau programme')
@section('body')
<div class="nk-wrap">@include('admin.layouts.header')<div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body">
    <h1 class="nk-block-title page-title mb-3">Nouveau programme</h1>
    <div class="card card-bordered"><div class="card-inner"><form method="POST" action="{{ route('admin.programmes.store') }}">@csrf
        @include('admin.programmes._form', ['programme' => null])
    </form></div></div>
</div></div></div>@include('admin.layouts.footer')</div>
@endsection
