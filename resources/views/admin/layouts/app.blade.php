<!DOCTYPE html>
<html lang="fr" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Administration de la plateforme ABE">
    <title>@yield('title', 'Administration') — ABE</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dashlite.css') }}">
    @yield('css')
</head>
<body class="nk-body bg-white has-sidebar">
    <div class="nk-app-root">
        <div class="nk-main">
            @include('admin.layouts.sidebar')
            @yield('body')
        </div>
    </div>

    <script src="{{ asset('admin-assets/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/scripts.js') }}"></script>
    @yield('js')
</body>
</html>
