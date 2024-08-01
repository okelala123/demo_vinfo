<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TPARequest extends FormRequest
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
            "tpa_code"=>"string|max:255",
            "tpa_logo"=>"string|max:255",
            "tpa_name"=>"string|max:255",
            "tpa_phone"=>"integer|max:15",
            "providers_id"=>"string|exists:providers,id",
            "product_family_id"=>"string|exists:product_families,id",
        ];
    }
}
