<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Sécurité du formulaire
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'title' => 'required|string|max:20',
            'message' => 'required|string|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'veuillez entrer un email valide',
            'email.email' => 'veuillez entrer une adresse mail valide',
            'title.required' => 'votre message fait plus de 20 caractères',
            'message.required' => 'le champs doit être remplis',
            'message.min' => 'Le message doit contenire plus de 5 caractères.'
        ];
    }
}
