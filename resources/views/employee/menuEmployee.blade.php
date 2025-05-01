@extends('base')

@section('head')
    <link rel="stylesheet" href="{{ asset('assets/css/crud.css') }}">
@endsection

@section('content')
<div id="root">
    @php
        $buttonConfig = [
            [
                'link' => route('employee.avis'),
                'icon' => 'ph ph-smiley',
                'description' => 'Avis',
            ],
            [
                'link' => route('employee.litige'),
                'icon' => 'ph ph-smiley-sad',
                'description' => 'Litige',
            ]
        ];
    @endphp

    @foreach ($buttonConfig as $button)
        <a href="{{ $button['link'] }}" class="button-menu">
            <i class="{{ $button['icon'] }}"></i> {{ $button['description'] }}
        </a>
    @endforeach

    <a class="footer-button" href="{{ route('logout') }}">
        <i class="ph ph-door"></i>
    </a>
</div>
@endsection
