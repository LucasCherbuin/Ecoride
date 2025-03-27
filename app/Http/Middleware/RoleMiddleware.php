<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            abort(403, 'Accès interdit');
        }

        // Vérifier si l'utilisateur a un des rôles spécifiés
        $user = Auth::user()->roles->pluck('label')->toArray(); // Assuming your roles are stored as an array
        if (!array_intersect($user, $roles)) {
            abort(403, 'Vous n\'avez pas l\'autorisation pour accéder à cette page');
        }

        // Si l'utilisateur a un rôle approprié, on passe à la suite
        return $next($request);
    }
}




