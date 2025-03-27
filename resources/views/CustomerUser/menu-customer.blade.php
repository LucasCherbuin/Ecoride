@extends('base')
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
<div>
    <script>
        window.buttonConfig = [
            @if (Auth::user()->hasRole('ROLE_USER'))
            { link: "{{ route('CustomerUser.RoleAttribution') }}", icon: 'ph ph-user-check', description: "Validation" },
            @elseif (Auth::user()->hasRole('ROLE_CONDUCTEUR'))
            { link: "{{ route('CustomerUser.annonceCreation') }}", icon: 'ph ph-signpost', description: "Création annonce" },
            { link: "{{ route('CustomerUser.gestionTrajet') }}", icon: 'ph ph-car-profile', description: "Gestion des trajets" },
            { link: "{{ route('CustomerUser.trajet') }}", icon: 'ph ph-flag-banner', description: "Trajet en cours" },
            @elseif (Auth::user()->hasRole('ROLE_PASSAGER'))
            { link: "{{ route('CustomerUser.gestionTrajet') }}", icon: 'ph ph-signpost', description: "Trajet en cours" },
            { link: "{{ route('CustomerUser.avis') }}", icon: 'ph ph-star', description: "Avis" },
            @endif
        ];

        // Génération dynamique des boutons
        const root = document.getElementById('root');
        window.buttonConfig.forEach(button => {
            const linkElement = document.createElement('a');
            linkElement.href = button.link;
            linkElement.innerHTML = `<i class="${button.icon}"></i> ${button.description}`;
            linkElement.classList.add('button-menu'); // Classe CSS pour styliser les boutons
            root.appendChild(linkElement);
        });
    </script>

    <button class="footer-button" href="{{ route('logout') }}">
        <i class="ph ph-door"></i>
    </button>
</div>
