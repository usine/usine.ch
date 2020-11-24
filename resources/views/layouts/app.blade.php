<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'L\'Usine') }}</title>
    <meta name="description" content="Centre culturel autogéré - Genève">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light py-3 py-md-5">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="/img/usine.svg" height="30" width="157" alt="{{ config('app.name', 'L\'Usine') }}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Afficher/cacher la navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('events.index') }}" class="nav-link {{ (request()->is('agenda*')) ? 'active' : '' }}">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('news.index') }}" class="nav-link {{ (request()->is('actualites*')) ? 'active' : '' }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('venues.index') }}" class="nav-link {{ (request()->is('espaces*')) ? 'active' : '' }}">Espaces</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('usine') }}" class="nav-link {{ (request()->is('usine')) ? 'active' : '' }}">L'Usine?</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}">Contact</a>
                    </li>
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Déconnexion') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger mb-0">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="py-5">
        @yield('content')
    </main>

    <div class="container">
        <hr>
    </div>

    <footer class="container py-5">
        <p>
            <b>L'Usine</b> / La permanence<br>
            4, Place des Volontaires<br>
            1204 Genève, Suisse<br>
            <a href="tel:+41227813490">+41 22 781 34 90</a>
            <br>
            <a href="mailto:usine@usine.ch">usine@usine.ch</a>
        </p>
        <p>
            La permanence de L’Usine est ouverte du lundi au jeudi
            <br>
            Bureau: 4, Place des Volontaires – 2ème étage, à droite.
        </p>

        @auth
            <a class="text-muted" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Déconnexion') }}
            </a>
        @else
            <a href="{{ route('login') }}" class="text-muted">{{ __('Connexion') }}</a>
        @endauth
        <a href="{{ route('contribuer') }}" class="text-muted ml-3">Contribuer à usine.ch</a>
    </footer>
</body>
</html>
