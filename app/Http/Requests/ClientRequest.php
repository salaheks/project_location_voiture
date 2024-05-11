<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Convert 'isCompany' checkbox value to boolean
        $this->merge([
            'isCompany' => $this->filled('isCompany'), // 'filled' checks if value is present and not empty; returns true or false
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required',
            'date_naissance' => 'nullable',
            'adresse' => 'nullable',
            'cin' => 'nullable',
            'num_passeport' => 'nullable',
            'date_delivration_passeport' => 'nullable',
            'permis' => 'nullable',
            'date_delivration_permis' => 'nullable',
            'telephone' => 'required',
            'email' => 'nullable',
            'isCompany' => 'boolean',
            'ice' => [
                $this->isCompany ? 'required' : 'nullable',
                function ($attribute, $value, $fail) {
                    if ($this->isCompany && empty($value)) {
                        $fail('Le champ '.$attribute.' est requis lorsque la société est sélectionnée.');
                    }
                },
            ],
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
            'boolean' => ':attribute doit etre vrai ou faux.',
        ];
    }
}
