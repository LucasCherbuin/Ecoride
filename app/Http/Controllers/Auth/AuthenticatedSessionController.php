<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AuthenticatedSessionController extends Controller
{
    /**
     * Affiche la vue de connexion.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Gère la tentative de connexion.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Vérifie les identifiants fournis par l'utilisateur
    $credentials = $request->only('email', 'password');

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->withInput();
    }

    // Régénère la session pour éviter les attaques de session fixation
    $request->session()->regenerate();

    // Récupère l'utilisateur connecté
    $user = Auth::user();

    // Debug : Vérifie le rôle avant de rediriger
    if (!$user) {
        return redirect('/login')->with('error', 'Problème lors de l\'authentification.');
    }

    // Redirection selon le rôle de l'utilisateur
    switch ($user->label) {
        case 'ROLE_ADMIN':
            return redirect()->route('admin.menu-admin');
        case 'ROLE_USER':
        case 'ROLE_CONDUCTEUR':
        case 'ROLE_PASSAGER':
            return redirect()->route('user.menu-utilisateur');
        case 'ROLE_EMPLOYEE':
            return redirect()->route('employee.menu-employee');
        default:
            return redirect('/')->with('error', 'Rôle non reconnu');
    }


    }
    /**
     * Déconnecte l'utilisateur et détruit la session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Déconnexion réussie');
    }


}

