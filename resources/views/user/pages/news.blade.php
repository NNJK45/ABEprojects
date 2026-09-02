@extends('user.layouts.app')

@section('content')
    <div class="page-banner-area overlay section">
        <div class="container">
            <div class="row">
                <div class="page-banner text-center col-xs-12">
                    <h1>Dernières actualités</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Dernières actualités</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="news-area bg-white section pt-120 pb-120">
        <div class="container">
            <div class="row mb--30">
                @forelse ($actualites as $actualite)
                    <div class="col-lg-4 col-md-6 col-12 mb-30">
                        <article class="news-item">
                            <div class="image">
                                <img src="{{ $actualite->image }}" alt="Actualité {{ $actualite->titre }}">
                            </div>
                            <div class="content">
                                <h3>{{ $actualite->titre }}</h3>
                                <div class="news-meta fix">
                                    <span><i class="zmdi zmdi-calendar-check"></i>{{ $actualite->date_publication->format('d/m/Y') }}</span>
                                </div>
                                <p>{{ \Illuminate\Support\Str::limit($actualite->contenu, 160) }}</p>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucune actualité n'est disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

            {{ $actualites->links() }}
        </div>
    </div>
@endsection
