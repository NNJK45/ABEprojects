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
    <link rel="stylesheet" href="/assets/css/abe-public.css">

    <!-- Modernizr JS -->
    <script src="/assets/js/vendor/modernizr-3.11.2.min.js"></script>
</head>

<body>
    <a href="#contenu-principal" class="sr-only sr-only-focusable">Aller au contenu principal</a>

    <header class="abe-site-header">
        <div class="abe-topbar"><div class="container"><span><i class="fa fa-map-marker"></i> Yaoundé, Cameroun</span><div><a href="tel:{{ preg_replace('/\s+/', '', $siteSetting?->contact_phone ?? '+237690450704') }}"><i class="fa fa-phone"></i> {{ $siteSetting?->contact_phone ?? '+237 690 450 704' }}</a><a href="https://www.facebook.com/acadmiedubienetre/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i> Suivre l’ABE</a></div></div></div>
        <div class="abe-navbar"><div class="container">
            <a class="abe-site-brand" href="{{ route('home') }}"><img src="/assets/img/logo/logoo.png" alt="Académie du Bien-Être"><span><strong>Académie du Bien-Être</strong><small>Éducation · Entrepreneuriat · Santé</small></span></a>
            <button class="abe-menu-toggle" type="button" aria-expanded="false" aria-controls="abe-navigation"><span></span><span></span><span></span><span class="sr-only">Ouvrir le menu</span></button>
            <nav id="abe-navigation" class="abe-navigation" aria-label="Navigation principale"><ul>
                <li><a @class(['active' => request()->routeIs('home')]) href="{{ route('home') }}">Accueil</a></li>
                <li><a @class(['active' => request()->routeIs('programme*')]) href="{{ route('programme') }}">Programmes</a></li>
                <li><a @class(['active' => request()->routeIs('event*')]) href="{{ route('event') }}">Événements</a></li>
                <li><a @class(['active' => request()->routeIs('news*')]) href="{{ route('news') }}">Actualités</a></li>
                <li><a @class(['active' => request()->routeIs('gallery')]) href="{{ route('gallery') }}">Galerie</a></li>
                <li><a @class(['active' => request()->routeIs('about')]) href="{{ route('about') }}">À propos</a></li>
            </ul></nav>
            <a class="abe-header-cta" href="{{ route('contact') }}">Nous contacter</a>
        </div></div>
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
            <script>document.querySelector('.abe-menu-toggle')?.addEventListener('click', function () { const nav = document.querySelector('.abe-navigation'); const open = nav.classList.toggle('is-open'); this.setAttribute('aria-expanded', open ? 'true' : 'false'); });</script>

    </body>

</html>
