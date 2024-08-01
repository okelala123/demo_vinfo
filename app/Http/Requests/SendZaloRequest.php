<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendZaloRequest extends FormRequest
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
            "type_send_zalo"=>"string|max:20",
            "distributors_organizations_id"=>"string|exists:distributors_organizations,id",
            "customer_notifications_id"=>"string|exists:customer_notifications,id",
        ];
    }

    public function messages()
    {
        return [
            "type_send_zalo.max"=>"The type option title may not be greater than 20 characters",
        ];
    }
}
