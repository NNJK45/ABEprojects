@extends('layouts.app')

@section('content')
<!-- Page Banner Area Start -->
<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>Galerie de Photos</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="#">Galerie de Photos</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->
    
<!-- Gallery Area Start -->
<div class="gallery-area section bg-white pt-120 pb-120">
    <div class="container">
        <div class="row">
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-1.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/1.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-2.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/2.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-3.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/3.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-4.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/4.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-5.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/5.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-6.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/6.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-7.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/7.jpg" alt="Image"></a>
            <!-- Gallery Item -->
            <a href="/assets/img/gallery/big-8.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-sm-6 col-12"><img src="/assets/img/gallery/8.jpg" alt="Image"></a>
        </div>
    </div>
</div>
<!-- End of Gallery Area -->

@endsection