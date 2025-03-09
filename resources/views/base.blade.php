<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    @livewireStyles
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
    <header>
        <div class="title">
            <h1>Ecoride</h1>
        <div>
            <nav class="navbar">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item" href="welcome">
                            <i class="ph ph-house-line"></i><span class="sr-only"></span>
                        </a>
                        <a class="nav-item" href="covoiturage">
                            <i class="ph ph-car-profile"></i>
                        </a>
                        @if (Auth::check())
                            <a class="nav-item" href="menu">
                                <i class="ph ph-user-circle"></i>
                            </a>
                        @else
                            <a class="nav-item" href="connexion">
                                <i class="ph ph-user-circle-plus"></i>
                            </a>
                        @endif
                        <a class="nav-item" href="contact">
                            <i class="ph ph-envelope"></i>
                        </a>
                    </div>
                </div>
            </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <a class="footer-text">Ecoride@arcadia.fr</a>
        <a class="footer-text">Mention légal</a>
    </footer>

    <!-- Ajouter des scripts JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts

</body>
</html>
