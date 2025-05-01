<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'depart' => 'required|string|max:255',
            'arrive' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'depart.required' => 'Le champ départ est obligatoire.',
            'arrive.required' => 'Le champ arrivée est obligatoire.',
        ];
    }
}
