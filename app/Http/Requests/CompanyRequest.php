<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'string',
            'capital' => 'string|nullable',
            'tp' => 'string|nullable',
            'rc' => 'string|nullable',
            'idf' => 'string|nullable',
            'ice' => 'string|nullable',
            'address' => 'string|nullable',
            'rib' => 'string|nullable',
            'swift' => 'string|nullable',
            'url' => 'string|nullable',
            'email' => 'string|nullable|email',
            'phone' => 'string|nullable',
            'directorphone' => 'string',
            'logo' => 'string|nullable',
            'franchise' => 'numeric|nullable',
        ];
    }
}
