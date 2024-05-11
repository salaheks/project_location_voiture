<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VidangeRequest extends FormRequest
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
            'mode_reglement' => 'sometimes',
            'prix' => 'required',
            'date_changement' => 'required|date',
            'voiture_id' => 'required',
            'km_debut' => 'required',
            'type_huile' => 'nullable',
            'filtre_huile' => 'boolean',
            'filtre_air' => 'boolean',
            'filtre_gazoil' => 'boolean',
            'km_vidange' => 'required',
        ];
    }
}
