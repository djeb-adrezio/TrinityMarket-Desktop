<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="dark">
    <title>@yield('title', 'Time Manager')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Applique l'état replié avant le premier rendu pour éviter tout saut visuel. --}}
    <script>
        try {
            if (localStorage.getItem('tm.sidebar.collapsed') === '1') {
                document.documentElement.classList.add('sidebar-collapsed');
            }
        } catch (e) {}
    </script>
</head>
<body>
    @hasSection('bare')
        @yield('content')
    @else
        <a class="skip-link" href="#contenu">Aller au contenu</a>

        <aside class="sidebar" id="sidebar">
            <div class="sidebar__head">
                <a class="brand" href="{{ route('logged.dashboard') }}">
                    <img class="brand__logo" src="{{ asset('assets/img/logo.webp') }}"
                         width="34" height="34" alt="">
                    <span class="brand__name">Time Manager</span>
                </a>
                <button type="button" class="icon-btn sidebar__close" data-nav-close
                        aria-label="Fermer la navigation">
                    <x-icon name="close" :size="18" />
                </button>
            </div>

            <nav class="sidebar__nav" aria-label="Navigation principale">
                @php
                    $links = [
                        ['route' => 'logged.dashboard', 'icon' => 'grid',  'label' => 'Tableau de bord'],
                        ['route' => 'pointed',          'icon' => 'clock', 'label' => 'Pointages'],
                        ['route' => 'kpi.index',        'icon' => 'chart', 'label' => 'KPI'],
                    ];
                @endphp
                @foreach ($links as $link)
                    <a class="nav-item" href="{{ route($link['route']) }}" title="{{ $link['label'] }}"
                       @if (request()->routeIs($link['route'])) aria-current="page" @endif>
                        <x-icon :name="$link['icon']" :size="19" />
                        <span class="nav-item__label">{{ $link['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="sidebar__foot">
                <a class="nav-item" href="{{ route('home') }}" title="Déconnexion">
                    <x-icon name="log-out" :size="19" />
                    <span class="nav-item__label">Déconnexion</span>
                </a>
                <button type="button" class="nav-item nav-item--btn" data-sidebar-toggle
                        aria-controls="sidebar" aria-expanded="true">
                    <x-icon name="panel" :size="19" />
                    <span class="nav-item__label">Replier le menu</span>
                </button>
            </div>
        </aside>

        <div class="sidebar-scrim" data-nav-close hidden></div>

        <div class="app-main">
            <div class="topbar">
                <button type="button" class="icon-btn" data-nav-open
                        aria-controls="sidebar" aria-expanded="false" aria-label="Ouvrir la navigation">
                    <x-icon name="menu" :size="20" />
                </button>
                <span class="topbar__title">@yield('title', 'Time Manager')</span>
            </div>

            <main class="wrap" id="contenu">
                @yield('content')
            </main>

            <footer class="app-footer">
                Time Manager &middot; gestion du temps de travail
            </footer>
        </div>

        <script src="{{ asset('js/app.js') }}" defer></script>
    @endif
</body>
</html>
