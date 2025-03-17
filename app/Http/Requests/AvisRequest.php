<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'avis' => 'required|string|min:10|max:100',
            'note' => 'required|string|min:1|max:5'
        ];
    }

    public function messages(): array
    {
        return [
            'avis.required' => 'veuillez ecrire un avis',
            'avis.min' => 'veuillez indiquer plus de 5 charcaters',
            'avis.max' => 'message trop long',
            'note.required' => 'veuillez ajouter une étoile',
        ];
    }
}
