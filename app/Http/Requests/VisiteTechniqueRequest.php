<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VisiteTechniqueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'centre_visite_id' => 'required',
            'date_controle' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if ($value >= $this->date_prochaine_visite) {
                        $fail('La date de controle doit être antérieure à la date de prochaine visite');
                    }
                }
            ],
            'date_prochaine_visite' => 'required|date',
            'montant' => 'required',
            'mode_reglement' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute est obligatoire.',
        ];
    }
}
