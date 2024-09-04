@extends('layouts.app')

@section('content')

<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>DERNIÈRES ACTUALITÉS</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="#">DERNIÈRES ACTUALITÉS</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->

<!-- News Area Start --> 
<div class="news-area bg-white section pt-120 pb-120">
    <div class="container">
        <div class="row mb--30">
              <!-- News Item -->
              @foreach ($actualites as $actualite)
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="news-item">
                    <a href="news-details.html" class="image"><img src="{{$actualite->image}}" alt="Image"></a>
                    <div class="content">
                        <h3><a href="news-details.html">{{$actualite->titre}}</a></h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>{{ \Carbon\Carbon::parse($actualite->created_at)->format('d M Y, H:i') }}</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                       </div>
                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour of passages of Lorem Ipsuable. </p>
                       <a href="news-details.html">LEARN Now</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- News Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="news-item">
                    <a href="news-details.html" class="image"><img src="/assets/img/news/5l.jpg" alt="Image"></a>
                    <div class="content">
                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                       </div>
                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour of passages of Lorem Ipsuable. </p>
                       <a href="news-details.html">LEARN Now</a>
                    </div>
                </div>
            </div>
            <!-- News Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="news-item">
                    <a href="news-details.html" class="image"><img src="/assets/img/news/6l.jpg" alt="Image"></a>
                    <div class="content">
                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                       </div>
                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour of passages of Lorem Ipsuable. </p>
                       <a href="news-details.html">LEARN Now</a>
                    </div>
                </div>
            </div>
            <!-- News Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="news-item">
                    <a href="news-details.html" class="image"><img src="/assets/img/news/8l.jpg" alt="Image"></a>
                    <div class="content">
                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                       </div>
                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour of passages of Lorem Ipsuable. </p>
                       <a href="news-details.html">LEARN Now</a>
                    </div>
                </div>
            </div>
            <!-- News Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="news-item">
                    <a href="news-details.html" class="image"><img src="/assets/img/news/9l.jpg" alt="Image"></a>
                    <div class="content">
                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                       </div>
                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour of passages of Lorem Ipsuable. </p>
                       <a href="news-details.html">LEARN Now</a>
                    </div>
                </div>
            </div>
            <!-- News Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="news-item">
                    <a href="news-details.html" class="image"><img src="/assets/img/news/6.jpg" alt="Image"></a>
                    <div class="content">
                        <h3><a href="news-details.html">Learn English in ease</a></h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                       </div>
                       <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour of passages of Lorem Ipsuable. </p>
                       <a href="news-details.html">LEARN Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Latest News Area -->

@endsection