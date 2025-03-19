@extends ('base')
<link rel="stylesheet" href="{{ asset('assets/css/crud.css') }}">
<div>
    <script>

        window.buttonConfig = [
            @if (Auth::ROLE_USER())
            { link: "{{ path('CustomerUser/RoleAttribution') }}", icon: 'ph ph-user-check', description: "Validation" },
            @elseif (Aunt::ROLE_CONDUCTEUR())
            { link: "{{ path('CustomerUser/annonceCreation') }}", icon: 'ph ph-signpost', description: "Creation annonce" },
            { link: "{{ path('CustomerUser/gestionTrajet') }}", icon: 'ph ph-car-profile', description: "gestion des trajets" },
            { link: "{{ path('CustomerUser/trajet') }}", icon: 'ph ph-flag-banner', description: "trajet en cours" },
            @else (Aunt::ROLE_PASSAGER()
            { link: "{{ path('CustomerUser/gestionTrajet') }}", icon: 'ph ph-signpost', description: "trajet en cours" },
            { link: "{{ path('CustomerUser/avis') }}", icon: 'ph ph-star', description: "avis" },
        )
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

    <button class="footer-button" herf="logout">
        <i class="ph ph-door"></i>
    </button>
</div>