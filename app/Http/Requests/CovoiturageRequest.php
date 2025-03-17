<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CovoiturageRequest extends FormRequest
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
            //voyage
            'depart' => 'required|string',
            'arrive' => 'required|string',
            'heure' => 'required|time',
            'EnergieVerte' => 'nullable|boolean',
            //choix du véhicule
            'modeles' => 'required|collection',
            //ajout d'un véhicule
            'modele' => 'nullable|string|max:20|min:5',
            'marque' => 'nullable|string|max:20|min:5',
            'couleur' => 'nullable|string|max:20|min:5',
            'nombre_places' => 'nullable|string|max:20|min:5',
            'energie' => 'nullable|string|max:20|min:5'
        ];
    }

    public function messages(): array
    {
        return [
            'depart.required' => 'Indiquez un départ',
            'arrive.required' => 'Indiquez une arrive',
            'heure.required' => 'indiquez une heure',
            'modeles' => 'veuillez ajouter un véhicule pour le voyage'
        ];
    }
}
