@extends('user.layouts.app')
@section('title', 'Contact')

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
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>Contactez-nous</li>
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
                    <h4>Coordonnées</h4>
                    <div class="contact-info">
                        @if($siteSetting?->contact_phone)<p><i class="zmdi zmdi-phone"></i><span>{{ $siteSetting->contact_phone }}</span></p>@endif
                        @if($siteSetting?->contact_email)<p><i class="zmdi zmdi-email"></i><span>{{ $siteSetting->contact_email }}</span></p>@endif
                        @if($siteSetting?->address)<p><i class="zmdi zmdi-pin"></i><span>{{ $siteSetting->address }}</span></p>@endif
                    </div>
                    <!-- Contact Social -->
                    <h4>Réseaux sociaux</h4>
                    <div class="contact-social fix">
                        <a href="https://web.facebook.com/acadmiedubienetre?locale=fr_FR"><i class="fa fa-facebook"></i></a>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-6 col-md-8 col-sm-7 col-xs-12">
                    <h4>Envoyez-nous un message</h4>
                    @if(session('success'))<div class="alert alert-success" role="alert">{{ session('success') }}</div>@endif
                    @if($errors->any())<div class="alert alert-danger" role="alert"><ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
                    <form id="contact-form" class="contact-form" action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12 mb-20">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nom" required maxlength="255">
                            </div>
                            <div class="col-md-6 col-12 mb-20">
                                <input type="email" name="email" id="mail" value="{{ old('email') }}" placeholder="Email" required maxlength="255">
                            </div>
                            <div class="col-12 mb-20"><input type="text" name="subject" value="{{ old('subject') }}" placeholder="Objet" maxlength="255"></div>
                            <div aria-hidden="true" style="position:absolute;left:-9999px"><label for="website">Site web</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
                            <div class="col-12 mb-20">
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message" required minlength="10" maxlength="5000">{{ old('message') }}</textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn-submit" type="submit">Envoyer</button>
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
