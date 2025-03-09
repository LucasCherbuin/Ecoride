<link href="{{ asset('assets/css/form.css') }}" rel="stylesheet">
@extends('base')

@section('content')

<form class="custom-form" action="{{ route('contact.send')}}" method="POST">
    @csrf
    <input class="form-input" type="email" name="email" placeholder="email" value="{{ old('name') }}">
    @error('email') <p style="color: red;"{{ $message }}</p> @enderror

    <input class="form-input" type="text" name="title" placeholder="titre" value="{{ old('title') }}">
    @error('titre') <p style="color: red;"{{ $message }}</p> @enderror

    <textarea class="form-input" name="message" placeholder="message">{{ old('message') }}</textarea>
    @error('message') <p style="color: red;"{{ $message }}</p> @enderror

    <button class="form-button" type="submit">Envoyer</button>
</form>

@endsection
