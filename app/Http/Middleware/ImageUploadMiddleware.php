<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageUploadMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasFile('image')) {
            $file =$request->file('image');

            //image valide
            if (!$file->isValid() || !in_array($file->extension(), ['jpg', 'jpeg', 'png', ])) {
                return response()->json(['error' => 'image non supporté'], 400);
            }
        }

        return $next($request);
    }
}
