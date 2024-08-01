<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            "distributors_id"=>"string|exists:distributors_organizations,id",
            "current_distributor_id"=>"string|exists:distributors_organizations,id",
            "default_distributor_id"=>"string|exists:distributors_organizations,id"
        ];
    }
}
