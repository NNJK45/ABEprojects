<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion — ABE</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/dashlite.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/theme.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/css/abe-admin.css') }}">
</head>
<body class="nk-body npc-default pg-auth abe-login-page">
    <div class="nk-app-root">
        <main class="abe-login-shell">
            <section class="abe-login-brand-panel">
                <div class="abe-login-brand"><span class="abe-brand-mark"><img src="{{ asset('assets/img/logo/abe-logo.png') }}" alt="Logo ABE"></span><span><strong>Académie du Bien-Être</strong><small>Administration ABE · Yaoundé</small></span></div>
                <div class="abe-login-message"><span class="abe-eyebrow">ESPACE DE GESTION</span><h1>Agir, informer et accompagner.</h1><p>Gérez les programmes, événements et actualités qui portent les actions de l’ABE.</p><div class="abe-pillars"><span><em class="icon ni ni-book-read"></em>Soutien éducatif</span><span><em class="icon ni ni-growth-fill"></em>Entrepreneuriat</span><span><em class="icon ni ni-heart-fill"></em>Santé pour tous</span></div></div>
                <small class="abe-login-credit">Une plateforme conçue pour l’équipe ABE.</small>
            </section>
            <section class="abe-login-form-panel">
                <div class="abe-login-card">
                    <div class="abe-login-icon"><em class="icon ni ni-shield-check"></em></div>
                    <span class="abe-eyebrow">CONNEXION SÉCURISÉE</span>
                    <h2>Bienvenue</h2>
                    <p>Utilisez votre compte professionnel pour accéder à l’administration.</p>

                                <form method="POST" action="{{ route('admin.login.store') }}" class="abe-login-form">
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

                                    <button class="btn btn-lg btn-primary btn-block" type="submit"><span>Se connecter</span><em class="icon ni ni-arrow-right"></em></button>
                                </form>
                    <div class="abe-login-help"><em class="icon ni ni-lock-alt"></em><span>Accès réservé aux membres autorisés de l’équipe ABE.</span></div>
                </div>
            </section>
        </main>
    </div>
    <script src="{{ asset('admin-assets/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('admin-assets/assets/js/abe-admin.js') }}"></script>
</body>
</html>
