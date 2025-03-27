
@extends('base')
<link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
@section('content')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="custom-form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="pseudo" :value="__('Pseudo')" />
            <x-text-input id="pseudo" class="form-input" type="text" name="pseudo" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="form-button ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>

@endsection