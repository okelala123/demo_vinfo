<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DistributorRequest extends FormRequest
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
            "code"=>"string|max:255",
            "logo"=>"string|max:255",
            "name"=>"string|max:255",
            "phone1"=>"integer",
            "code"=>"integer",
            "product_family_id"=>"string|exists:distributors_organizations,id",
            "providers_id"=>"string|exists:distributors_organizations,id",
            "catalog_id"=>"string|exists:distributors_organizations,id",
        ];
    }
}
