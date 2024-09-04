@extends('layouts.app')

@section('content')

<!-- Page Banner Area Start -->
<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>Nos Événements</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="#">Nos Événements</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->
    
<!-- Event Area Start -->
<div class="event-area bg-white section pt-120 pb-90">
    <div class="container">
        <div class="row">
            <!-- Event Item -->
            @foreach($evenements as $event)
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="event-item">
                    <img src="{{ $event->image }}" alt="Image">
                    <span class="date">{{\Carbon\Carbon::parse($event->date)->format('d')}} <span>{{\Carbon\Carbon::parse($event->date)->format('M')}}</span></span>
                    <div class="content">
                        <h3><a href="{{route('event.details', $event->id) }}">{{$event->titre}}</a></h3>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> {{$event->date}}</span>
                            <span><i class="zmdi zmdi-pin"></i> {{$event->lieu}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Event Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="event-item">
                    <img src="/assets/img/event/2.jpg" alt="Image">
                    <span class="date">24 <span>Apr</span></span>
                    <div class="content">
                        <h3><a href="event-details.html">Learn English in ease</a></h3>>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> 4.00 pm - 8.00 pm</span>
                            <span><i class="zmdi zmdi-pin"></i> Dhaka Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="event-item">
                    <img src="/assets/img/event/3.jpg" alt="Image">
                    <span class="date">30 <span>Apr</span></span>
                    <div class="content">
                        <h3><a href="event-details.html">Learn English in ease</a></h3>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> 4.00 pm - 8.00 pm</span>
                            <span><i class="zmdi zmdi-pin"></i> Dhaka Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="event-item">
                    <img src="/assets/img/event/4.jpg" alt="Image">
                    <span class="date">05 <span>Apr</span></span>
                    <div class="content">
                        <h3><a href="event-details.html">Learn English in ease</a></h3>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> 4.00 pm - 8.00 pm</span>
                            <span><i class="zmdi zmdi-pin"></i> Dhaka Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="event-item">
                    <img src="/assets/img/event/5.jpg" alt="Image">
                    <span class="date">01 <span>Apr</span></span>
                    <div class="content">
                        <h3><a href="event-details.html">Learn English in ease</a></h3>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> 4.00 pm - 8.00 pm</span>
                            <span><i class="zmdi zmdi-pin"></i> Dhaka Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="event-item">
                    <img src="/assets/img/event/6.jpg" alt="Image">
                    <span class="date">15 <span>Apr</span></span>
                    <div class="content">
                        <h3><a href="event-details.html">Learn English in ease</a></h3>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> 4.00 pm - 8.00 pm</span>
                            <span><i class="zmdi zmdi-pin"></i> Dhaka Bangladesh</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Event Area -->
@endsection