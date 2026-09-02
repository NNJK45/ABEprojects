<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', $siteSetting?->site_name ?? 'ABE') — Académie du Bien-Être</title>
    <meta name="description" content="@yield('meta_description', 'L’Académie du Bien-Être accompagne les personnes défavorisées par ses programmes et actions sociales au Cameroun.')">
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
    <script src="/assets/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <a href="#contenu-principal" class="sr-only sr-only-focusable">Aller au contenu principal</a>

    <!-- Header Area Start -->
    <header class="header-area section">
        <!-- Header Top -->
        <div class="header-top section">
            <div class="container">
                <div class="row">
                    <!-- Header Top Left -->
                    <div class="header-top-left text-start col-7">
                        <p>Une question ? {{ $siteSetting?->contact_phone ?? '+237 690 450 704' }}</p>
                    </div>
                    <!-- Header Top Right -->
                    <div class="header-top-right text-end col-5">
                        <ul>
                            <li><a href="{{ route('contact') }}">Nous contacter</a></li>
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

        <main id="contenu-principal">
            @yield('content')
        </main>

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
