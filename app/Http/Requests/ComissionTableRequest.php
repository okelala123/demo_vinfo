<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComissionTableRequest extends FormRequest
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
            "providers_id"=>"string|exists:providers,id",
            "product_family_id"=>"string|exists:product_families,id",
            "distributors_organizations_id"=>"string|exists:distributors_organizations,id",
            "ranks_id"=>"string|exists:ranks,id",
        ];
    }
}
