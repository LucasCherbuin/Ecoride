<?php

namespace App\Http\Controllers\Auth;

use \App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

//création d'un utilisateur pour la clientèle
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
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'credit' => ['20'],
        ]);

        // Assigner le rôle "ROLE_EMPLOYEE" à l'utilisateur
        $role = Role::where('label', 'ROLE_USER')->first();
        if ($role) {
            $user->role()->associate($role);
            $user->save();
        }

        // Déclenchement de l'événement de l'enregistrement
        event(new Registered($user));

        // Connexion de l'utilisateur
        Auth::login($user);

        // Redirection après l'enregistrement
        return redirect(route('user.menuCustomer', absolute: false));
    }

    //Fonction pour les images
    public function image(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');


            //génération de nom unique
            $filename = time() . '_' . $file->getClientOriginalName();

            //Stockage de l'image dans le dossier public
            $path = $file->storeAs('public/uploadImage', $filename);
        }
    }
}

