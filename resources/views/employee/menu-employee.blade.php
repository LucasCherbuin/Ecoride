@extends ('base')
<link rel="stylesheet" href="{{ asset('assets/css/crud.css') }}">
<div>
    <script>

        window.buttonConfig = [
            { link: "{{ path('employee/avis') }}", icon: 'ph ph-smiley', description: "avis" },
            { link: "{{ path('employee/litige') }}", icon: 'ph ph-smiley-sad', description: "litige" },

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