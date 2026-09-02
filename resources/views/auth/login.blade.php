<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion — ABE</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/theme.css') }}">
</head>
<body class="nk-body bg-white npc-default pg-auth">
    <div class="nk-app-root">
        <div class="nk-main">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content">
                    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <h1 class="nk-block-title">Administration ABE</h1>
                                <p>Connectez-vous avec votre compte autorisé.</p>

                                <form method="POST" action="{{ route('admin.login.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="email">Adresse e-mail</label>
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                               id="email" name="email" type="email" value="{{ old('email') }}"
                                               autocomplete="email" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password">Mot de passe</label>
                                        <input class="form-control form-control-lg @error('password') is-invalid @enderror"
                                               id="password" name="password" type="password"
                                               autocomplete="current-password" required>
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-control-xs custom-checkbox">
                                            <input class="custom-control-input" id="remember" name="remember" type="checkbox" value="1">
                                            <label class="custom-control-label" for="remember">Rester connecté</label>
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin-assets/assets/js/bundle.js') }}"></script>
</body>
</html>
