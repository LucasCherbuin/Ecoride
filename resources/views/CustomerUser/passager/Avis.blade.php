<link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">
@extends('base')

<div class="avis">
    @include('components.annonce')
    <div class="mb-3">
        <label for=note" class="note">
            <i class="ph ph-star"></i>
            <i class="ph ph-star"></i>
            <i class="ph ph-star"></i>
            <i class="ph ph-star"></i>
            <i class="ph ph-star"></i>
        </label>
    </div>

    <div class="mb-3">
        <label for="detail" class="form-label">détail :</label>
    </div>


<div>

@endsection