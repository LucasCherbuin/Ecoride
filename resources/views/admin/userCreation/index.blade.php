@extends ('base')
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
@section('content')
<a href="{{ route('menu-admin') }}" class="back-button">
    <i class="ph ph-arrow-left"></i>
</a>

<table>
    <thead>
        <tr>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
    </thead>
    <tbody id="userTableBody">
        @foreach ($users as $user)
            <tr data-role="{{ $user->role_id->label ?? 'Aucun rôle' }}">
                <td>{{ $user->pseudo }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    {{-- Affichage du rôle de manière lisible --}}
                    {{ $user->role->label ?? 'Aucun rôle' }}
                </td>
                <td>
                    <a href="{{ route('admin.userCreation.edit', ['id' => $user->id]) }}"><i class="ph ph-note-pencil"></i></a>
                    <form method="post" action="{{ route('admin.userCreation.destroy', ['id' => $user->id]) }}" onsubmit="return confirm('Êtes-vous sûr ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><i class="ph ph-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="button-group">
    <a href="{{ route('admin.userCreation.create') }}" class="button">
        <i class="ph ph-plus-circle"></i>
    </a>
</div>
@endsection