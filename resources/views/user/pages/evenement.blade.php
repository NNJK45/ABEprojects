@extends('user.layouts.app')
@section('title', 'Événements')

@section('content')
    <div class="page-banner-area overlay section">
        <div class="container">
            <div class="row">
                <div class="page-banner text-center col-xs-12">
                    <h1>Nos Événements</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Nos événements</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="event-area bg-white section pt-120 pb-90">
        <div class="container">
            <div class="row">
                @forelse ($evenements as $event)
                    <div class="col-lg-4 col-md-6 col-12 mb-30">
                        <div class="event-item">
                            <img src="{{ $event->image_url }}" alt="Événement {{ $event->titre }}" loading="lazy">
                            <span class="date">{{ $event->date->format('d') }} <span>{{ $event->date->format('M') }}</span></span>
                            <div class="content">
                                <h3><a href="{{ route('event.details', $event) }}">{{ $event->titre }}</a></h3>
                                <div class="event-meta fix">
                                    <span><i class="zmdi zmdi-time"></i>{{ $event->date->format('d/m/Y') }}</span>
                                    <span><i class="zmdi zmdi-pin"></i>{{ $event->lieu }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Aucun événement n'est disponible pour le moment.</p>
                    </div>
                @endforelse
            </div>

            {{ $evenements->links() }}
        </div>
    </div>
@endsection
