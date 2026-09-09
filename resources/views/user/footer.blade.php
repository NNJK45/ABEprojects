
<footer class="abe-site-footer section"><div class="container">
    <div class="abe-footer-grid">
        <div class="abe-footer-about"><a class="abe-footer-brand" href="{{ route('home') }}"><span>ABE</span><strong>Académie du Bien-Être</strong></a><p>Nous accompagnons les communautés par l’éducation, l’entrepreneuriat et la promotion de la santé pour tous.</p><a class="abe-facebook-link" target="_blank" rel="noopener" href="https://www.facebook.com/acadmiedubienetre/"><i class="fa fa-facebook"></i> Retrouvez-nous sur Facebook</a></div>
        <div><h3>Découvrir</h3><ul><li><a href="{{ route('about') }}">À propos de l’ABE</a></li><li><a href="{{ route('programme') }}">Nos programmes</a></li><li><a href="{{ route('event') }}">Nos événements</a></li><li><a href="{{ route('news') }}">Nos actualités</a></li><li><a href="{{ route('gallery') }}">Galerie</a></li></ul></div>
        <div><h3>Nous contacter</h3><ul class="abe-contact-list"><li><i class="fa fa-map-marker"></i><span>{{ $siteSetting?->address ?? 'Yaoundé, Cameroun' }}</span></li><li><i class="fa fa-phone"></i><a href="tel:{{ preg_replace('/\s+/', '', $siteSetting?->contact_phone ?? '+237690450704') }}">{{ $siteSetting?->contact_phone ?? '+237 690 450 704' }}</a></li>@if($siteSetting?->contact_email)<li><i class="fa fa-envelope"></i><a href="mailto:{{ $siteSetting->contact_email }}">{{ $siteSetting->contact_email }}</a></li>@endif</ul><a class="abe-footer-cta" href="{{ route('contact') }}">Écrire à notre équipe</a></div>
    </div>
    <div class="abe-footer-bottom"><p>© {{ now()->year }} {{ $siteSetting?->site_name ?? 'Académie du Bien-Être' }}. Tous droits réservés.</p><p>Agir aujourd’hui pour un mieux-être durable.</p></div>
</div></footer>
