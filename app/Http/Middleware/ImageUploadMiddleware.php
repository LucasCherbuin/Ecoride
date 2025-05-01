<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageUploadMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si une image est bien envoyée
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = strtolower($file->getClientOriginalExtension());

            // Vérifie si l'extension est valide
            if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
                return response()->json(['error' => 'Image non supportée'], 400);
            }
        }

        return $next($request);
    }
}
