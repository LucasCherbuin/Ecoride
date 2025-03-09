<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class itineraireRequest extends FormRequest
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
            'depart' => 'required|string|max:20',
            'arrivé' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'départ.required' => 'veuillez utiliser des characters autorisés',
            'arrivé.required' => 'veuillez utiliser des characters autorisés',
        ];
    }
}
