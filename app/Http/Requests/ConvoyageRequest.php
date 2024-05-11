<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvoyageRequest extends FormRequest
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
            'ville' => 'required',
            'prix_mad_ville_livraison' => 'required',
            'prix_mad_ville_retour' => 'required',
            'prix_euro_ville_livraison' => 'nullable',
            'prix_euro_ville_retour' => 'nullable',
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
