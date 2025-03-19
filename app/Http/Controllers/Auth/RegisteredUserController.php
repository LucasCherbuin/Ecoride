<?php

namespace App\Http\Controllers\Auth;

use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation des données envoyées
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'pseudo' => $request->pseudo,  // Correction ici
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Déclenchement de l'événement de l'enregistrement
        event(new Registered($user));

        // Connexion de l'utilisateur
        Auth::login($user);

        // Redirection après l'enregistrement
        return redirect(route('menu-utilisateur', absolute: false));
    }
}
