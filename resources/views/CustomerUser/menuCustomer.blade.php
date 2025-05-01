@extends('base')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
@endsection

@section('content')
<div id="root">
    @php
        $buttonConfig = [];

        if (Auth::user()->hasRole('ROLE_USER')) {
            $buttonConfig[] = [
                'link' => route('CustomerUser.RoleAttribution'),
                'icon' => 'ph ph-user-check',
                'description' => 'Validation'
            ];
        }

        if (Auth::user()->hasRole('ROLE_CONDUCTEUR') || Auth::user()->hasRole('ROLE_CHAUFFEURPASSAGER')) {
            $buttonConfig[] = [
                'link' => route('CustomerUser.annonceCreation'),
                'icon' => 'ph ph-signpost',
                'description' => 'Création annonce'
            ];
            $buttonConfig[] = [
                'link' => route('CustomerUser.gestionTrajet'),
                'icon' => 'ph ph-car-profile',
                'description' => 'Gestion des trajets'
            ];
            $buttonConfig[] = [
                'link' => route('CustomerUser.trajet'),
                'icon' => 'ph ph-flag-banner',
                'description' => 'Trajet en cours (conducteur)'
            ];
        }

        if (Auth::user()->hasRole('ROLE_PASSAGER') || Auth::user()->hasRole('ROLE_CHAUFFEURPASSAGER')) {
            $buttonConfig[] = [
                'link' => route('CustomerUser.gestionTrajet'),
                'icon' => 'ph ph-signpost',
                'description' => 'Trajet en cours (passager)'
            ];
            $buttonConfig[] = [
                'link' => route('CustomerUser.avis'),
                'icon' => 'ph ph-star',
                'description' => 'Avis'
            ];
        }
    @endphp

    @foreach ($buttonConfig as $button)
        <a href="{{ $button['link'] }}" class="button-menu">
            <i class="{{ $button['icon'] }}"></i> {{ $button['description'] }}
        </a>
    @endforeach

    <a href="{{ route('logout') }}" class="footer-button">
        <i class="ph ph-door"></i>
    </a>
</div>
@endsection
