
@extends ('base')
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

<a href="{{ path('menu-admin') }}" class="back-button">
    <i class="ph ph-arrow-left"></i>
</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                {% for user in users %}
                    <tr data-role="{{ user.roles|first }}">
                        <td>{{ user.id }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            {# Affichage des rôles de manière lisible #}
                            {% for role in user.roles %}
                                {{ role }}
                                {% if not loop.last %}, {% endif %}
                            {% endfor %}
                        </td>
                        <td>
                            <a href="{{ path('profile.edit', {'id': user.id}) }}"><i class="ph ph-note-pencil"></i></a>
                            <form method="post" action="{{ path('profile.destroy', {'id': user.id}) }}" onsubmit="return confirm('Êtes-vous sûr ?');">
                                <input type="hidden" name="_token" value="{{ csrf_token('delete' ~ user.id) }}">
                                <button type="submit"><i class="ph ph-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>

    <div class="button-group">
            <a href="{{ path('profile.create') }}" class="button">
                <i class="ph ph-plus-circle"></i>
            </a>
    </div>
