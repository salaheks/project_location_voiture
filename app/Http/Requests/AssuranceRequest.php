<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuranceRequest extends FormRequest
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
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'date_paiement' => 'sometimes',
            'type' => 'required',
            'mode_reglement' => 'sometimes',
            'assureur' => 'sometimes',
            'prix_assurance' => 'sometimes',
            'voiture_id' => 'required',
            'assureur_id' => 'sometimes',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => ':attribute est obligatoire.',
        ];
    }
}
