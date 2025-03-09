<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\EcorideMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController
{
    public function create()
    {
        return view('contact');
    }

        public function send(ContactRequest $request)
    {
        $details = [
            'email' => $request->email,
            'message' => $request->message,
            'title' => $request->title,
        ];

        Mail::to('ecoride@example.com')->send(new EcorideMail($details));

        return redirect()->back()->with('reussi', 'Votre message nous a bien été transmis !');
    }
}
