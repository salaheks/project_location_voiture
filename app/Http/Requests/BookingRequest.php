<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'date_livraison' => 'required|date',
            'date_retour' => 'required|date',
            'nbr_jour' => 'required',
            'voiture_id' => 'required',
            'client_id' => 'required',
            'driver_id' => 'sometimes',
            'num_ref' => 'nullable',
            'contract_num' => 'nullable',
            'adresse_livraison' => 'sometimes',
            'adresse_retour' => 'sometimes',
            'rachat_franchise' => 'boolean',
            'prix_location' => 'sometimes',
            'prix_accessoires' => 'sometimes',
            'total' => 'required',
            'nombreKmPickUp' => 'sometimes',
            'nombreKmDropOff' => 'sometimes',
            'prix_franchise' => 'sometimes',
            'avance' => 'sometimes',
            'mode_reglement_pickup' => 'sometimes',
            'mode_reglement_dropoff' => 'sometimes',
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
