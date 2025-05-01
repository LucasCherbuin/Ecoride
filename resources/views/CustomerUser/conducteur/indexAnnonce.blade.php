@extends ('base')
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
@section('content')
<a href="{{ route('menuAdmin') }}" class="back-button">
    <i class="ph ph-arrow-left"></i>
</a>

<table>
    <thead>
        <tr>
            <th mes Covoiturages</th>
        </tr>
    </thead>
    <tbody id="userTableBody">
        @foreach ($Covoiturages as $covoitrage)
            <tr data-role="{{ $covoiturage->id ?? 'Aucun covoiturage réalisé' }}">
                @include('components.annonce')
                <td>
                    <a href="{{ route('conducteur.annonceCreation.edit', ['id' => $covoiturage->id]) }}"><i class="ph ph-note-pencil"></i></a>
                    <form method="post" action="{{ route('admin.annonceCreation.destroy', ['id' => $covoiturage->id]) }}" onsubmit="return confirm('Êtes-vous sûr ?');">
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
    <a href="{{ route('conducteur.annonceCreation.create') }}" class="button">
        <i class="ph ph-plus-circle"></i>
    </a>
</div>
@endsection