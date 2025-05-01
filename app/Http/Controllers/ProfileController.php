<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('admin.userCreation.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.userCreation.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'pseudo' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'exists:roles,id'],  // Validation que le rôle existe dans la table 'roles'
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Créer un nouvel utilisateur
        $user = User::create([
            'name' => $request->pseudo,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Associer le rôle "employé" à l'utilisateur
        $role = Role::findOrFail('ROLE_EMPLOYE');  // Récupère le rôle avec l'ID 5, ou échoue si ce rôle n'existe pas

        // Associer ce rôle à l'utilisateur
        $user->roles()->attach($role);  // On associe le rôle à l'utilisateur

        // Événement d'enregistrement d'un utilisateur
        event(new Registered($user));

        // Rediriger vers une page de confirmation ou de gestion des utilisateurs
        return redirect(route('admin.userCreation.index'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.userCreation.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('admin.userCreation.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('admin.userCreation');
    }
}
