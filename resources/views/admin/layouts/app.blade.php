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
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/abe-admin.css') }}">
    @yield('css')
</head>
<body class="nk-body has-sidebar abe-admin">
    <div class="nk-app-root">
        <div class="nk-main">
            @include('admin.layouts.sidebar')
            @yield('body')
        </div>
    </div>

    <script src="{{ asset('admin-assets/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/abe-admin.js') }}"></script>
    <script>
        document.querySelectorAll('[data-gallery-uploader]').forEach(function (uploader) {
            const input = uploader.querySelector('[data-gallery-input]');
            const preview = uploader.querySelector('[data-gallery-preview]');
            const summary = uploader.querySelector('[data-gallery-summary]');

            input.addEventListener('change', function () {
                preview.innerHTML = '';
                const files = Array.from(this.files || []);
                summary.textContent = files.length ? files.length + (files.length > 1 ? ' images sélectionnées' : ' image sélectionnée') : 'Aucune nouvelle image sélectionnée';

                files.slice(0, 10).forEach(function (file) {
                    const item = document.createElement('figure');
                    const image = document.createElement('img');
                    const caption = document.createElement('figcaption');
                    image.src = URL.createObjectURL(file);
                    image.alt = '';
                    image.addEventListener('load', function () { URL.revokeObjectURL(image.src); });
                    caption.textContent = file.name;
                    item.append(image, caption);
                    preview.appendChild(item);
                });
            });
        });
    </script>
    @yield('js')
</body>
</html>
