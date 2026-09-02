@extends('user.layouts.app')
@section('title', 'À propos')
@section('content')
<div class="page-banner-area overlay section"><div class="container"><div class="row"><div class="page-banner text-center col-xs-12"><h1>À propos de l’ABE</h1><ul class="breadcrumb"><li><a href="{{ route('home') }}">Accueil</a></li><li>À propos</li></ul></div></div></div></div>
<section class="about-area section bg-white pt-120 pb-100"><div class="container"><div class="row align-items-center">
    <div class="col-lg-6 col-12 mb-30"><img src="/assets/img/about/about.jpg" alt="Académie du Bien-Être"></div>
    <div class="col-lg-6 col-12 mb-30"><h2>Une association tournée vers l’accompagnement</h2><p>L’Académie du Bien-Être œuvre pour l’encadrement des personnes défavorisées à travers des programmes éducatifs, sociaux et communautaires.</p><p>Son action vise à créer des espaces d’écoute, d’apprentissage et de participation permettant à chacun de développer son autonomie et de prendre part à la vie collective.</p><p>Les informations détaillées sur l’histoire, la gouvernance et les partenaires de l’association seront publiées après validation par l’équipe ABE.</p></div>
</div></div></section>
<section class="section bg-gray pt-100 pb-100"><div class="container"><div class="row"><div class="col-md-4 mb-30"><h3>Accompagner</h3><p>Orienter les bénéficiaires et proposer un cadre d’écoute adapté à leurs besoins.</p></div><div class="col-md-4 mb-30"><h3>Former</h3><p>Développer les connaissances et compétences utiles à l’autonomie personnelle et professionnelle.</p></div><div class="col-md-4 mb-30"><h3>Mobiliser</h3><p>Créer des occasions de rencontre et de collaboration autour d’actions d’intérêt collectif.</p></div></div><div class="text-center mt-4"><a class="btn" href="{{ route('contact') }}">Échanger avec notre équipe</a></div></div></section>
@endsection
