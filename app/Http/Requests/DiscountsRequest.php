<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountsRequest extends FormRequest
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
            'type' => 'in:daily,monthly,yearly,6_months,quarterly,trip,percent',
            'type_discount' => 'numeric',
            'type_value' => 'numeric',
            'quantity_discount' => 'numeric',
            'quantity_value' => 'numeric',
            'products_id' => 'exists:products,id', 
            'prices_id' => 'exists:prices,id', 
        ];
    }

    public function messages()
    {
        return [
            'type.in' => 'The type must be one of the following values: daily, monthly, yearly, 6_months, quarterly, trip, percent.',
            'type_discount.numeric' => 'The type discount must be a number.',
            'type_value.numeric' => 'The type value must be a number.',
            'quantity_discount.numeric' => 'The quantity discount must be a number.',
            'quantity_value.numeric' => 'The quantity value must be a number.',
            'products_id.exists' => 'The selected product does not exist.',
            'prices_id.exists' => 'The selected price does not exist.',
        ];
    }
}
