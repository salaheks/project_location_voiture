<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeRequest extends FormRequest
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
        $typeId = $this->route('type');
        return [
            'marque' => [
                'required',
                'string',
                Rule::unique('types')->where(function ($query) {
                    return $query->where('model', $this->model)
                                 ->where('transmission', $this->transmission)
                                 ->where('carburant', $this->carburant);
                })->ignore($typeId),
            ],
            'model' => 'required|string',
            'transmission' => 'required|string|in:manuel,automatique',
            'carburant' => 'required|string|in:diesel,essence',
            'prix' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
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
            'unique' => 'Ce type existe déjà',
        ];
    }
}
