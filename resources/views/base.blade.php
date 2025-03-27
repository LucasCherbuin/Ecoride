<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecoride</title>

    <!-- Icônes -->
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>

    <!-- Styles -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="title">
            <h1>Ecoride</h1>
        </div>

        <nav class="navbar">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item" href="{{ url('/') }}">
                        <i class="ph ph-house-line"></i>
                    </a>
                    <a class="nav-item" href="{{ url('/covoiturage') }}">
                        <i class="ph ph-car-profile"></i>
                    </a>

                    @php
                        $role = auth()->user()->role ?? '';
                    @endphp

                    @if ($role === 'ROLE_ADMIN')
                        <a class="nav-item" href="{{ url('/admin/menuAdmin') }}">
                            <i class="ph ph-user-circle"></i>
                        </a>
                    @elseif ($role === 'ROLE_EMPLOYEE')
                        <a class="nav-item" href="{{ url('/employee/menu-employee') }}">
                            <i class="ph ph-user-circle"></i>
                        </a>
                    @elseif (in_array($role, ['ROLE_USER', 'ROLE_CONDUCTEUR', 'ROLE_PASSAGER']))
                        <a class="nav-item" href="{{ url('/user/menu-customer') }}">
                            <i class="ph ph-user-circle"></i>
                        </a>
                    @else
                        <a class="nav-item" href="{{ url('/login') }}">
                            <i class="ph ph-user-circle-plus"></i>
                        </a>
                    @endif

                    <a class="nav-item" href="{{ url('/contact') }}">
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
        <p class="footer-text">Ecoride@arcadia.fr</p>
        <p class="footer-text"><a href="{{ url('/mentions-legales') }}">Mentions légales</a></p>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
