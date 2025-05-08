<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$role)
    {

        // Récupère l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Si l'utilisateur est connecté et qu'il a des rôles à vérifier
        if ($user) {
            // Récupère les labels des rôles de l'utilisateur (on suppose une relation 'role')
            $userRole = $user->role->pluck('label')->toArray();

            // Vérifie si l'utilisateur a un des rôles demandés
            if (!array_intersect($role, $userRole)) {
                // Si non, on renvoie une erreur 403
                abort(403, 'Accès interdit');
            }
        }

        // Continue la requête si l'utilisateur a le rôle adéquat
        return $next($request);
    }
}

