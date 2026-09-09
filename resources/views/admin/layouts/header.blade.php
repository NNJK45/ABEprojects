<header class="nk-header nk-header-fixed abe-header">
    <div class="container-fluid"><div class="nk-header-wrap">
        <div class="nk-menu-trigger d-xl-none ml-n1"><a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu" aria-label="Ouvrir le menu"><em class="icon ni ni-menu"></em></a></div>
        <div class="abe-header-intro d-none d-md-block"><span>Administration ABE</span><small>{{ now()->translatedFormat('l d F Y') }}</small></div>
        <div class="nk-header-tools"><ul class="nk-quick-nav">
            <li class="d-none d-sm-block"><a class="abe-public-link" href="{{ route('home') }}" target="_blank" rel="noopener"><em class="icon ni ni-globe"></em><span>Voir le site</span></a></li>
            <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class="user-toggle"><div class="user-avatar sm abe-avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div><div class="user-info d-none d-md-block"><div class="user-status">{{ auth()->user()->role->value === 'admin' ? 'Administrateur' : 'Éditeur' }}</div><div class="user-name dropdown-indicator">{{ auth()->user()->name }}</div></div></div></a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 abe-user-menu">
                    <div class="dropdown-inner user-card-wrap"><div class="user-card"><div class="user-avatar abe-avatar">{{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</div><div class="user-info"><span class="lead-text">{{ auth()->user()->name }}</span><span class="sub-text">{{ auth()->user()->email }}</span></div></div></div>
                    <div class="dropdown-inner"><ul class="link-list"><li><a href="{{ route('admin.password.edit') }}"><em class="icon ni ni-lock-alt"></em><span>Changer le mot de passe</span></a></li></ul></div>
                    <div class="dropdown-inner"><form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="btn btn-link abe-logout" type="submit"><em class="icon ni ni-signout"></em><span>Se déconnecter</span></button></form></div>
                </div>
            </li>
        </ul></div>
    </div></div>
</header>
