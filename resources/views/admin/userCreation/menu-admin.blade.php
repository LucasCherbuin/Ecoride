@extends ('base')
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
<div>
    <script>
        // Configuration des boutons avec Twig pour générer les URLs côté serveur
        window.buttonConfig = [
            { link: "{{ path('admin/dashboard') }}", icon: 'ph ph-chart-bar', description: "Dashboard" },
            { link: "{{ path('admin/userCreation') }}", icon: 'ph ph-tree-evergreen', description: "gestion utilisteur" },

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