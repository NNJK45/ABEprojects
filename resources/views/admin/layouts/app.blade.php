<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>ABE project</title>
    <!-- StyleSheets  -->
    {{-- <link rel="stylesheet" href="./assets/css/dashlite.css?ver=2.9.1"> --}}
    {{-- <link id="skin-default" rel="stylesheet" href="./assets/css/theme.css?ver=2.9.1"> --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dashlite.css') }}">
    @yield('css')
</head>

<body class="nk-body bg-white has-sidebar ">
    <div class="nk-app-root">
        <div class="nk-main ">
            @include('admin.layouts.sidebar')
            @yield('body')
        </div>
    </div>

    <!-- JavaScript -->
    {{-- <script src="./assets/js/bundle.js?ver=2.9.1"></script>
    <script src="./assets/js/scripts.js?ver=2.9.1"></script>
    <script src="./assets/js/charts/gd-default.js?ver=2.9.1"></script> --}}

    <script src="{{ asset('admin-assets/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/charts/gd-default.js') }}"></script>
    @yield('js')
</body>

</html>
