<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email_customer_services' => 'email|max:255',
            'email_accountant' => 'email|max:255',
            'phone_1' => 'string|max:20',
            'phone_2' => 'string|max:20',
            'providers_id' => 'exists:providers,id',
        ];
    }

    public function messages()
    {
        return [
            'email_customer_services.email' => 'The email for customer services must be a valid email address.',
            'email_customer_services.max' => 'The email for customer services may not be greater than 255 characters.',
            'email_accountant.email' => 'The email for accountant must be a valid email address.',
            'email_accountant.max' => 'The email for accountant may not be greater than 255 characters.',
            'phone_1.string' => 'Phone 1 must be a string.',
            'phone_1.max' => 'Phone 1 may not be greater than 20 characters.',
            'phone_2.string' => 'Phone 2 must be a string.',
            'phone_2.max' => 'Phone 2 may not be greater than 20 characters.',
            'providers_id.exists' => 'The selected provider ID is invalid.',
        ];
    }
}
