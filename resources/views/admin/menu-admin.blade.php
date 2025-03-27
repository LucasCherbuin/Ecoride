@extends ('base')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

<div id="root">
    {{-- Génération dynamique des boutons en Blade --}}
    @php
        $buttonConfig = [
            ['link' => route('admin.dashboard'), 'icon' => 'ph ph-chart-bar', 'description' => 'Dashboard'],
            ['link' => route('admin.userCreation.index'), 'icon' => 'ph ph-tree-evergreen', 'description' => 'Gestion utilisateur'],
        ];
    @endphp

    @foreach ($buttonConfig as $button)
        <a href="{{ $button['link'] }}" class="button-menu">
            <i class="{{ $button['icon'] }}"></i> {{ $button['description'] }}
        </a>
    @endforeach
</div>

{{-- Bouton de déconnexion --}}
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="footer-button">
        <i class="ph ph-door"></i> Déconnexion
    </button>
</form>

@endsection
