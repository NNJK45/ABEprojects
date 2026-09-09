<aside class="nk-sidebar nk-sidebar-fixed abe-sidebar" data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('admin.home') }}" class="abe-brand">
                <span class="abe-brand-mark">ABE</span>
                <span class="abe-brand-copy"><strong>Académie du Bien-Être</strong><small>Espace de gestion</small></span>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2"><a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu" aria-label="Fermer le menu"><em class="icon ni ni-arrow-left"></em></a></div>
    </div>
    <div class="nk-sidebar-element"><div class="nk-sidebar-content"><div class="nk-sidebar-menu" data-simplebar>
        <div class="abe-sidebar-context"><span class="abe-status-dot"></span><span>Plateforme opérationnelle</span></div>
        <ul class="nk-menu">
            <li class="nk-menu-heading"><h6 class="overline-title">Pilotage</h6></li>
            <li class="nk-menu-item {{ request()->routeIs('admin.home') ? 'active' : '' }}"><a href="{{ route('admin.home') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span><span class="nk-menu-text">Vue d’ensemble</span></a></li>
            <li class="nk-menu-heading"><h6 class="overline-title">Contenus</h6></li>
            <li class="nk-menu-item {{ request()->routeIs('admin.programmes.*') ? 'active' : '' }}"><a href="{{ route('admin.programmes.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-book"></em></span><span class="nk-menu-text">Programmes</span></a></li>
            <li class="nk-menu-item {{ request()->routeIs('admin.evenements.*') ? 'active' : '' }}"><a href="{{ route('admin.evenements.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-calendar"></em></span><span class="nk-menu-text">Événements</span></a></li>
            <li class="nk-menu-item {{ request()->routeIs('admin.actualites.*') ? 'active' : '' }}"><a href="{{ route('admin.actualites.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span><span class="nk-menu-text">Actualités</span></a></li>
            <li class="nk-menu-item {{ request()->routeIs('admin.images.*') ? 'active' : '' }}"><a href="{{ route('admin.images.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-img"></em></span><span class="nk-menu-text">Médiathèque</span></a></li>
            <li class="nk-menu-heading"><h6 class="overline-title">Relations</h6></li>
            <li class="nk-menu-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}"><a href="{{ route('admin.messages.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-mail-fill"></em></span><span class="nk-menu-text">Messages</span></a></li>
            @can('viewAny', App\Models\User::class)
                <li class="nk-menu-heading"><h6 class="overline-title">Administration</h6></li>
                <li class="nk-menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><a href="{{ route('admin.users.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span><span class="nk-menu-text">Utilisateurs</span></a></li>
            @endcan
            @if(auth()->user()->isAdmin())
                <li class="nk-menu-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}"><a href="{{ route('admin.settings.edit') }}" class="nk-menu-link"><span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span><span class="nk-menu-text">Paramètres</span></a></li>
            @endif
        </ul>
        <div class="abe-sidebar-footer"><a href="{{ route('home') }}" target="_blank" rel="noopener"><em class="icon ni ni-external"></em><span>Ouvrir le site public</span></a></div>
    </div></div></div>
</aside>
