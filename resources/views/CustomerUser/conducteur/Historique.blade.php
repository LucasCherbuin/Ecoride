
@extends('base')

@section('content')
<link href="{{ asset('assets/css/annonce.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">


    @foreach ($covoiturages as $covoiturage)
    <div class="card">
        <h2>{{ $covoiturage->depart }} → {{ $covoiturage->arrive }}</h2>
        <p>Statut actuel : <strong>{{ $covoiturage->status }}</strong></p>

        <form action="{{ url('/covoiturages/' . $covoiturage->id . '/status') }}" method="POST">
            @csrf
            @method('PATCH')
            <select name="status">
                @foreach (\App\Models\Covoiturage::getStatuses() as $status)
                    <option value="{{ $status }}" {{ $covoiturage->status === $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
            @include('components.annonce')
        </form>
    </div>
@endforeach


