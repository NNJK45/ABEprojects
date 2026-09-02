
<!-- Footer Top Area Start -->
<div class="footer-top-area section pt-100 pb-0 pb-xl-4">
    <div class="container">
        <div class="row">
            <!-- Footer Widget -->
            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-50">
                <a class="footer-logo" href="{{ route('home') }}"><img src="/assets/img/logo/footer.png" alt="Logo de l’Académie du Bien-Être"></a>
                <p>L’Académie du Bien-Être agit pour l’encadrement, l’autonomie et l’inclusion des personnes défavorisées.</p>
                <div class="footer-social">
                    <a target="_blank" rel="noopener" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" rel="noopener" href="https://www.rss.com/"><i class="fa fa-rss"></i></a>
                    <a target="_blank" rel="noopener" href="https://www.plus.google.com/"><i class="fa fa-google-plus"></i></a>
                    <a target="_blank" rel="noopener" href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                    <a target="_blank" rel="noopener" href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <!-- Footer Widget -->
            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-50">
                <h3>NOUS CONTACTER</h3>
                <ul>
                    @if($siteSetting?->contact_phone)<li><i class="fa fa-phone"></i> <span>{{ $siteSetting->contact_phone }}</span></li>@endif
                    @if($siteSetting?->contact_email)<li><i class="fa fa-envelope"></i> <span>{{ $siteSetting->contact_email }}</span></li>@endif
                    @if($siteSetting?->address)<li><i class="fa fa-map-marker"></i> <span>{{ $siteSetting->address }}</span></li>@endif
                </ul>
            </div>
            <!-- Footer Widget -->
            <div class="footer-widget col-lg-3 col-md-6 col-12 mb-50">
                <h3>LIENS UTILES</h3>
                <ul>
                    <li><a href="{{ route('about') }}">À propos</a></li>
                    <li><a href="{{ route('programme') }}">Nos programmes</a></li>
                    <li><a href="{{ route('event') }}">Nos événements</a></li>
                    <li><a href="{{ route('news') }}">Nos actualités</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <!-- Footer Widget -->
            <div class="footer-widget col-lg-3 col-md-6 col-sm-8 col-12 mb-50">
                <h3>EN IMAGES</h3>
                <div class="instagram-widget">
                    <div><a target="_blank" rel="noopener" href="https://www.instagram.com/"><img src="/assets/img/instagram/1.jpg" alt="Image"></a></div>
                    <div><a target="_blank" rel="noopener" href="https://www.instagram.com/"><img src="/assets/img/instagram/2.jpg" alt="Image"></a></div>
                    <div><a target="_blank" rel="noopener" href="https://www.instagram.com/"><img src="/assets/img/instagram/3.jpg" alt="Image"></a></div>
                    <div><a target="_blank" rel="noopener" href="https://www.instagram.com/"><img src="/assets/img/instagram/4.jpg" alt="Image"></a></div>
                    <div><a target="_blank" rel="noopener" href="https://www.instagram.com/"><img src="/assets/img/instagram/5.jpg" alt="Image"></a></div>
                    <div><a target="_blank" rel="noopener" href="https://www.instagram.com/"><img src="/assets/img/instagram/6.jpg" alt="Image"></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Footer Top Area-->
<!-- Footer Bottom Area Start -->
<footer class="footer-bottom-area section">
    <div class="container">
        <div class="row">
            <div class="text-start col-md-6 col-sm-12">
                <p class="copyright">© {{ now()->year }} {{ $siteSetting?->site_name ?? 'ABE' }}. Tous droits réservés.</p>
            </div>
            <div class="text-end col-md-6 col-sm-12">
                <p><a href="{{ route('contact') }}">Contact et informations</a></p>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer Bottom Area -->
