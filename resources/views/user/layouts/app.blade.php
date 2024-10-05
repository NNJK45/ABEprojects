<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from htmldemo.net/study/study/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 29 Jun 2024 07:02:50 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ABE - Academie du bien être pour l'encadrement des défavorisés </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/material-design-iconic-font.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/assets/css/plugins.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/assets/css/responsive.css">

    <!-- Modernizr JS -->
    <script src="/assetsjs/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>

    <!-- Header Area Start -->
    <header class="header-area section">
        <!-- Header Top -->
        <div class="header-top section">
            <div class="container">
                <div class="row">
                    <!-- Header Top Left -->
                    <div class="header-top-left text-start col-7">
                        <p>Have any question? +237 690 450 704</p>
                    </div>
                    <!-- Header Top Right -->
                    <div class="header-top-right text-end col-5">
                        <ul>
                            <li><a href="#">Log In</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Bottom -->
        <div class="header-bottom bg-white sticker section sticker">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Header Logo -->
                        <div class="header-logo float-start">
                            <a href="{{ route('home') }}"><img src="/assets/img/logo/logoo.png" alt="logo"></a>
                        </div>
                        <!-- Header Buttons -->
                        <div class="header-buttons float-end">
                            <div class="header-search float-start">
                                <button class="search-toggle"><i class="zmdi zmdi-search"></i></button>
                                <div class="search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Search here..." name="search" />
                                        <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Main Menu -->
                        <div class="main-menu float-end hidden-xs">
                            <nav>
                                <ul>
                                    <li class="active"><a href="{{ route('home') }}">Accueil</a></li>

                                    <li><a href="{{ route('programme') }}">Programmes</a>
                                    <li><a href="{{ route('event') }}">Evenements</a>
                                    </li>
                                    <li><a href="{{ route('news') }}">Actualités</a> </li>
                                    <li><a href="{{ route('gallery') }}">Galerie</a></li>



                                    <li><a href="{{ route('about') }}">À propos de nous</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <body class="nk-body ui-rounder npc-default has-sidebar ">
        <div class="nk-app-root">
            @yield('content')
        </div>

        <body class="nk-body ui-rounder npc-default has-sidebar ">

            @include('user.footer')

            <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
            <script src="/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>

            <!-- bootstrap JS -->
            <script src="/assets/js/bootstrap.bundle.min.js"></script>

            <!-- plugins JS -->
            <script src="/assets/js/plugins.js"></script>

            <!-- main JS
============================================ -->
            <script src="/assets/js/main.js"></script>

        </body>

</html>
<!-- End of Header Area -->
