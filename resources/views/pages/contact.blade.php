@extends('layouts.app')

@section('content')

    <!-- Page Banner Area Start -->
    <div class="page-banner-area overlay section">
        <div class="container">
            <div class="row">
                <!-- Page Banner -->
                <div class="page-banner text-center col-xs-12">
                    <h1>Contactez-nous</h1>
                    <!-- Breadcrumb -->
                    <ul class="breadcrumb">
                        <li><a href="index.html">Accueil</a></li>
                        <li><a href="#">Contactez-nous</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page Banner Area -->

    <!-- Contact Area Start -->
    <div class="contact-area bg-white section pt-120 pb-70">
        <div class="container">
            <div class="contact-wrapper row">
                <div class="col-md-4 offset-lg-1 col-sm-5 col-xs-12 mb-50">
                    <!-- Contact Info -->
                    <h4>contact info</h4>
                    <div class="contact-info">
                        <p><i class="zmdi zmdi-phone"></i><span>+237 690 450 704/675 693 123 </span></p>
                        <p><i class="zmdi zmdi-email"></i><span>Academiebe18@gmail.com</span></p>
                        <p><i class="zmdi zmdi-pin"></i><span>yaounde, cameroun<br>
                                </span></p>
                    </div>
                    <!-- Contact Social -->
                    <h4>social media</h4>
                    <div class="contact-social fix">
                        <a href="https://web.facebook.com/acadmiedubienetre?locale=fr_FR"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-rss"></i></a>
                        <a href="academiedubienetre.org"><i class="fa fa-google-plus"></i></a>
                        <a href="www.pinterest.html"><i class="fa fa-pinterest"></i></a>
                        <a href="www.instagram.html"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-6 col-md-8 col-sm-7 col-xs-12">
                    <h4>send your massage</h4>
                    <form id="contact-form" class="contact-form" action="https://whizthemes.com/mail-php/other/mail.php" method="post">
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <input type="text" name="con_name" id="name" placeholder="Name">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <input type="email" name="con_email" id="mail" placeholder="Email">
                            </div>
                            <div class="col-12 mb-20">
                                <textarea name="con_message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn-submit" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                    <div class="form-message"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Contact Area -->

  
   
@endsection