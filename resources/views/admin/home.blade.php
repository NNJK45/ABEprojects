@extends('admin.layouts.app')

@section('title', 'Tableau de bord')

@section('body')
    <div class="nk-wrap">
        @include('admin.layouts.header')
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-lg">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h1 class="nk-block-title page-title">Tableau de bord</h1>
                                <p>Bienvenue, {{ auth()->user()->name }}.</p>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-md-4">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <h2 class="title">{{ $programmeCount }}</h2>
                                        <p>Programmes</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <h2 class="title">{{ $evenementCount }}</h2>
                                        <p>Événements</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <h2 class="title">{{ $actualiteCount }}</h2>
                                        <p>Actualités</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
