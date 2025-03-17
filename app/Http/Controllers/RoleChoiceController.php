<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conducteur;
use App\Models\User;
use App\Models\Role;
use App\Models\Modele;


class RoleChoiceController
{
    public function store(Request $request)
    {
        $request->vlaidate([
            'role' => 'required|in:ROLE_CONDUCTEUR, ROLE_PASSAGER',
        ]);

        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        if (str_contains($request->role, 'ROLE_CONDUCTEUR')) {
            Conducteur::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'conducteur' => $request->conducteur,
                    'modele' => $request->modele,
                    'preference' => $request->preference,
                ]
            );
        }

        return redirect()->back()->with('success', 'Role.s ajouté.e.s');
    }
}
