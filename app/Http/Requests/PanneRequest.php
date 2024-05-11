<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PanneRequest extends FormRequest
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
            'type' => 'sometimes',
            'date_paiment' => 'date|sometimes',
            'date_debut' => 'date|sometimes',
            'date_fin' => 'nullable|date',
            'prix_client' => 'sometimes',
            'prix_assurance' => 'sometimes',
            'prix_agence' => 'sometimes',
            'prix_total' => 'sometimes',
            'garage_responsable' => 'sometimes',
            'expert' => 'sometimes',
            'description' => 'sometimes',
            'date_panne' => 'required',
            'voiture_id' => 'required',
            'client_id' => 'required',
            'mode_reglement' => 'required',
        ];
    }
}
