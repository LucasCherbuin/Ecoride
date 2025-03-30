<link href="{{ mix('css/form.css') }}" rel="stylesheet">

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="custom-form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="form-input" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
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

       <div class="image" action="{{ route ('upload.image') }}" method="POST" entctype="multipart/form-data">
            <label for="image"><i class="ph ph-image"></i></label>
            <input type="file" name="image" id="image" required>

            <button type="submit">Envoyer</button>
       </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="form-button ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</x-guest-layout>
