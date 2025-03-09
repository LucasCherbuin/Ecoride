<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class filtreCovoiturageRequest extends FormRequest
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
            'energie' => 'required|boolean',
            'prix' => 'required|int|min:0',
            'duree' => 'required|date_format:H:i|min:0:10',
            'note' => 'required|int|min:0|max:5'
        ];
    }

    public function messages(): array
    {
        return [
            'prix.min' => 'le prix minimum est de 1 credit',
            'durée.min' => 'veuillez indiquer un trajet de plus de 10 minutes',
            'note.min' => 'veuillez indiquer une note entre 1 et 5',
            'note.max' => 'veuillez indiquer une note entre 1 et 5',
        ];
    }
}
