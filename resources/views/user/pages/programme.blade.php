@extends('user.layouts.app')

@section('content')
    <div class="page-banner-area overlay section">
        <div class="container">
            <div class="row">
                <div class="page-banner text-center col-xs-12">
                    <h1>Nos Programmes</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Nos programmes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="course-area bg-white section pt-120 pb-120">
        <div class="container">
            <div class="course-wrapper row mb--30">
                @forelse ($programmes as $programme)
                    <div class="col-lg-4 col-md-6 col-12 mb-30">
                        <div class="course-item">
                            <a class="image" href="{{ route('programme.details', $programme) }}">
                                <img src="{{ asset('assets/img/course/1.jpg') }}" alt="Programme {{ $programme->nom }}">
                            </a>
                            <div class="content">
                                <h4 class="title">
                                    <a href="{{ route('programme.details', $programme) }}">{{ $programme->nom }}</a>
                                </h4>
                                <div class="course-info">
                                    <span><i class="zmdi zmdi-calendar-check"></i>{{ $programme->created_at->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun programme n'est disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

            {{ $programmes->links() }}
        </div>
    </div>
@endsection
