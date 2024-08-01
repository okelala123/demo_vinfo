<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
            'type' => 'in:dailyterm,monthlyterm,yearlyterm,6_monthsterm,quarterlyterm,tripterm,percentterm',
            'exc_tax_price' => 'numeric',
            'inc_tax_price' => 'numeric',
            'extra_price' => 'numeric',
            'products_id' => 'exists:products,id',  
        ];
    }

    public function messages()
    {
        return [
            'type.in' => 'The type must be one of the following values: dailyterm, monthlyterm, yearlyterm, 6_monthsterm, quarterlyterm, tripterm, percentterm.',
            'exc_tax_price.numeric' => 'The price excluding tax must be a number.',
            'inc_tax_price.numeric' => 'The price including tax must be a number.',
            'extra_price.numeric' => 'The extra price must be a number.',
            'products_id.exists' => 'The selected product does not exist.',
        ];
    }
}
