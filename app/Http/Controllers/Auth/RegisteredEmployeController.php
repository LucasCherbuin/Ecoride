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

class RegisteredEmployeController extends Controller
{

public function createEmploye(): View
    {
        return view('admin.userCreation.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeEmploye(Request $request): RedirectResponse
    {
        // Validation des données envoyées
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Création de l'utilisateur employee
        $user = User::create([
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assigner le rôle "ROLE_EMPLOYEE" à l'utilisateur
        $role = Role::where('label', 'ROLE_EMPLOYE')->first();
        if ($role) {
            $user->role()->associate($role);
            $user->save();
        }

        // Déclenchement de l'événement de l'enregistrement
        event(new Registered($user));


        // Redirection après l'enregistrement
        return redirect(route('admin.userCreation.index', absolute: false));
    }
}