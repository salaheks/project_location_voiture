<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoitureRequest extends FormRequest
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
        $rules = [
            'nombre_porte' => 'nullable|integer',
            'couleur' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'type_id' => 'required|integer',
            'nombre_passager' => 'nullable|integer',
            'capacite_bagage' => 'nullable',
            'climatisation' => 'nullable|boolean',
            'airbag' => 'nullable|boolean',
            'mode_reglement' => 'nullable|string|max:255',
            'credit' => 'required|boolean',
            'avance_credit' => 'required_if_accepted:credit',
            'prix_achat' => 'required_if_accepted:credit',
            'date_mise' => 'nullable|date',
            'duree_credit_mois' => 'required_if_accepted:credit',
            'montant_paiement_par_mois' => 'required_if_accepted:credit',
            'date_debut_paiement' => 'required_if_accepted:credit',
        ];
        if ($this->isMethod('post')) {
            $rules['immatriculation'] = 'required|unique:voitures,immatriculation|string|max:255';
        } else {
            $rules['immatriculation'] = 'nullable|string|max:255';
        }

        return $rules;
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
            'unique' => ':attribute est deja existe.',
            'required_if_accepted' => 'Le champ :attribute est nécessaire lorsque l\'option de crédit est activée.',
        ];
    }
}
