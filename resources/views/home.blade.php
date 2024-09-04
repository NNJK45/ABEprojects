@extends('layouts.app')

@section('content')

    <!-- Slider Area Start -->
    <div class="slider-area section">
        <div id="hero-slider" class="slides">
            <img src="/assets/img/slider/8.jpg" alt="Image" title="#slider-caption1" />
            <img src="/assets/img/slider/9.jpg" alt="Image" title="#slider-caption1" />
            <img src="/assets/img/slider/4.jpg" alt="Image" title="#slider-caption2" />
            <img src="/assets/img/slider/6.jpg" alt="Image" title="#slider-caption1" />
            <img src="/assets/img/slider/5.jpg" alt="Image" title="#slider-caption2" />

        </div>
        <div id="slider-caption1" class="nivo-html-caption nivo-caption">
            <div class="container">
                <div class="row">
                    <div class="hero-content col-md-12">
                        <h2 class="wow fadeInUp" data-wow-delay="0.5s">Bienvenue à l'Académie du Bien-Être</h2>
                        <h1 class="wow fadeInUp" data-wow-delay="1s">pour l'encadrement des défavorisés</h1>
                        <p class="wow fadeInUp" data-wow-delay="1.5s"> Soutien educatif, promotion de l'entrepreneuriat, promotion de la santé pour tous. <br class="d-none d-md-block">  Construire de meilleurs avenirs pour tous</p>
                        <a class="btn wow fadeInUp" data-wow-delay="2s" href="{{ route('news') }}">Actualités</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="slider-caption2" class="nivo-html-caption nivo-caption">
            <div class="container">
                <div class="row">
                    <div class="hero-content col-md-12">
                        <h2 class="wow fadeInUp" data-wow-delay="0.5s">Bienvenue à l'Académie du Bien-Être</h2>
                        <h1 class="wow fadeInUp" data-wow-delay="1s">pour l'encadrement des défavorisés.</h1>
                        <p class="wow fadeInUp" data-wow-delay="1.5s">  Soutien educatif, promotion de l'entrepreneuriat, promotion de la santé pour tous. <br class="d-none d-md-block">  Construire de meilleurs avenirs pour tous</p>
                        <a class="btn wow fadeInUp" data-wow-delay="2s" href="{{ route('news') }}">Actualités</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Slider Area -->

    <!-- Course Area Start -->
    <div class="course-area bg-gray section pt-120 pb-120">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title text-center col-xs-12 mb-80">
                    <h3>Actualités</h3>
                    <p>Santé, Education Développement</p>
                </div>
            </div>
            <!-- Course Wrapper -->
            <div class="course-wrapper row mb--30">
                <!-- Course Item -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="course-item">
                        <a class="image" href="course-details.html"><img src="/assets/img/course/5l.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="course-details.html">Department of Mechanical Engineering (ME)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of ME</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Item -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="course-item">
                        <a class="image" href="course-details.html"><img src="/assets/img/course/6l.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="course-details.html">Industrial & Production Engineering (IPE)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of ME</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Item -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="course-item">
                        <a class="image" href="course-details.html"><img src="/assets/img/course/8l.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="course-details.html">Department of Civil Engineering (CE)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of CE</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Item -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="course-item">
                        <a class="image" href="course-details.html"><img src="/assets/img/course/8l.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="course-details.html">Industrial & Production Engineering (IPE)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of CE</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Item -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="course-item">
                        <a class="image" href="course-details.html"><img src="/assets/img/course/9l.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="course-details.html">Department of Electrical & Electronic Engineering (EEE)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of EEE</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Course Item -->
                <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                    <div class="course-item">
                        <a class="image" href="course-details.html"><img src="/assets/img/course/6l.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="course-details.html">Department of Biomedical Engineering (BME)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of EEE</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Course Area -->

    <!-- Funfact Area Start -->
    <div class="funfact-area section pt-100 pb-50">
        <div class="container">
            <div class="row">
                <!-- Single Funfact -->
                <div class="col-md-3 col-sm-6 mb-50">
                    <div class="single-funfact">
                        <h2><span class="counter">79</span>+</h2>
                        <h4>Teachers</h4>
                    </div>
                </div>
                <!-- Single Funfact -->
                <div class="col-md-3 col-sm-6 mb-50">
                    <div class="single-funfact">
                        <h2><span class="counter">750</span>+</h2>
                        <h4>Students</h4>
                    </div>
                </div>
                <!-- Single Funfact -->
                <div class="col-md-3 col-sm-6 mb-50">
                    <div class="single-funfact">
                        <h2><span class="counter">36</span>+</h2>
                        <h4>Courses</h4>
                    </div>
                </div>
                <!-- Single Funfact -->
                <div class="col-md-3 col-sm-6 mb-50">
                    <div class="single-funfact">
                        <h2><span class="counter">20</span>+</h2>
                        <h4>Countries</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Funfact Area -->

    <!-- Gallery Area Start -->
    <div class="gallery-area section bg-white pt-120 pb-0">
        <div class="container">
            <!-- Section Title -->
            <div class="section-title mb-80">
                <h3>GALERIE PHOTOS</h3>
                <p>There are many variations of passages</p>
            </div>
        </div>
        <!-- Portfolio Wrapper -->
        <div class="container-fluid">
            <div class="row">
                <a href="/assets/img/gallery/9.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/9.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/6.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/6.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/b1.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/b1.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/b2.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/b2.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/b3.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/b3.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/b4.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/b4.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/7.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/7.jpg" alt="Image"></a>
                <!-- Gallery Item -->
                <a href="/assets/img/gallery/8.jpg" class="gallery-item image-popup col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12"><img src="/assets/img/gallery/8.jpg" alt="Image"></a>
            </div>
        </div>
    </div>
    <!-- End of Gallery Area -->

    <!-- Event Area Start -->
    <div class="event-area bg-white section pt-120 pb-120">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title col-xs-12 mb-80">
                    <h3>NOS ÉVÉNEMENTS</h3>
                    <p>There are many variations of passages</p>
                </div>
            </div>
            <div class="row mb--30">
                <!-- Event Item -->
                <div class="col-lg-4 col-md-6 col-12 mb-30">
                    <div class="event-item">
                        <img src="/assets/img/event/6.jpg" alt="Image">
                        <span class="date">20 <span>Apr</span></span>
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
                        <img src="/assets/img/event/8.jpg" alt="Image">
                        <span class="date">24 <span>Apr</span></span>
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
                        <img src="/assets/img/event/9.jpg" alt="Image">
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
            </div>
        </div>
    </div>
    <!-- End of Event Area -->

    <!-- Testimonial Area Start -->
    <div class="testimonial-area overlay section pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-10 col-12 m-auto">
                    <!-- Testimonial Slider -->
                    <div class="testimonial-slider text-center">
                        <!-- Single Testimonial -->
                        <div class="sin-testimonial">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable orem Ipsum available, but the majority have suffered.</p>
                            <h4>Steven Hunt</h4>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="sin-testimonial">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable orem Ipsum available, but the majority have suffered.</p>
                            <h4>Adam James</h4>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="sin-testimonial">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable orem Ipsum available, but the majority have suffered.</p>
                            <h4>Kattie Luis</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Testimonial Area -->

    <!-- News Area Start -->
    <div class="news-area bg-white section pt-120 pb-120">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="section-title col-xs-12 mb-80">
                    <h3>latest news</h3>
                    <p>There are many variations of passages</p>
                </div>
            </div>
            <div class="row mb--30">
                <!-- News Item -->
                <div class="col-lg-4 col-md-6 col-12 mb-30">
                    <div class="news-item">
                        <a href="news-details.html" class="image"><img src="/assets/img/news/1.jpg" alt="Image"></a>
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
                        <a href="news-details.html" class="image"><img src="/assets/img/news/2.jpg" alt="Image"></a>
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
                        <a href="news-details.html" class="image"><img src="/assets/img/news/3.jpg" alt="Image"></a>
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