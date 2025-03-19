<nav class="bg-blue-600 text-white p-4">
    <div class="container mx-auto flex justify-between">
        <a href="{{ route('home') }}" class="font-bold">Accueil</a>

        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-4">Connexion</a>
                <a href="{{ route('register') }}">Inscription</a>
            @endauth
        </div>
    </div>
</nav>
