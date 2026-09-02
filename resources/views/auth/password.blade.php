@extends('admin.layouts.app')

@section('title', 'Changer le mot de passe')

@section('body')
    <div class="nk-wrap">
        @include('admin.layouts.header')
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-lg">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <h1 class="nk-block-title page-title">Changer le mot de passe</h1>
                    </div>

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                <form method="POST" action="{{ route('admin.password.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="form-label" for="current_password">Mot de passe actuel</label>
                                        <input class="form-control @error('current_password') is-invalid @enderror"
                                               id="current_password" name="current_password" type="password"
                                               autocomplete="current-password" required>
                                        @error('current_password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password">Nouveau mot de passe</label>
                                        <input class="form-control @error('password') is-invalid @enderror"
                                               id="password" name="password" type="password"
                                               autocomplete="new-password" required>
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="password_confirmation">Confirmer le nouveau mot de passe</label>
                                        <input class="form-control" id="password_confirmation" name="password_confirmation"
                                               type="password" autocomplete="new-password" required>
                                    </div>

                                    <button class="btn btn-primary" type="submit">Mettre à jour</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
