@extends('layouts.app')
@extends('base')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @include('components.annonce')
            @foreach($avis as $avis)
                <tr>
                    <td>{{ $avis->user->name }}</td>
                    <td>{{ $avis->content }}</td>
                    <td>
                        <form action="{{ route('avis.approve', $avis->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success"><i class="ph ph-check-circle"></i></i></button>
                        </form>
                        <form action="{{ route('avis.reject', $avis->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="ph ph-x-circle"></button>
                        </form>
                        <form action="{{ route('avis.reject', $user->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link"><i class="ph ph-envelope"></i></button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
