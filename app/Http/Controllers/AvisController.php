<?php

namespace App\Http\Controllers;
use App\Http\Requests\AvisRequest;
use App\Models\avis;
use Illuminate\Http\Request;

class AvisController
{
    public function create()
    {
        return view('avis');
    }

    public function send(AvisRequest $request)
    {
        Avis::create([
            'avis' => $request->avis,
            'note' => $request->avis,
        ]);
    }
}
