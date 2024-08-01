<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'catalog_id'=>'integer',
            'logo' => 'string|max:255',
            'name' => 'string|max:255',
            'desc' => 'string',
            'address' => 'string|max:255',
            'company_information' => 'string|max:255',
            'business_licence_number' => 'string',
            'code' => 'string',
     
        ];
    }
    public function messages()
{
    return [
        'catalog_id.integer' => 'Catalog ID must be an integer.',
        'logo.string' => 'Logo must be a string.',
        'logo.max' => 'Logo may not be greater than 255 characters.',
        'name.string' => 'Name must be a string.',
        'name.max' => 'Name may not be greater than 255 characters.',
        'desc.string' => 'Description must be a string.',
        'address.string' => 'Address must be a string.',
        'address.max' => 'Address may not be greater than 255 characters.',
        'company_information.string' => 'Company information must be a string.',
        'company_information.max' => 'Company information may not be greater than 255 characters.',
        'business_licence_number.string' => 'Business licence number must be a string.',
        'code.string' => 'Code must be a string.',
    ];
}
}
