<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributorMemberRequest extends FormRequest
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
            "username"=>"string|max:255",
            "name"=>"string|max:255",
            "email"=>"string|max:255",
            "id_taxcode"=>"string|max:255",
            "password"=>"string|max:255",
            "distributors_organizations_id"=>"string|exists:distributors_organizations,id"
        ];
    }
}
