<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VignetteRequest extends FormRequest
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
            'date_paiement' => 'required|date',
            'voiture_id' => 'required',
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
