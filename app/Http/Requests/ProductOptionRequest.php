<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductOptionRequest extends FormRequest
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
            'product_option_title' => 'string|max:255',
            'type' => 'in:checkbox,radio,select,label',
            'position' => 'string|max:255',
            'products_id' => 'exists:products,id',
        ];
    }

    public function messages()
    {
        return [
            'product_option_title.string' => 'The product option title must be a string.',
            'product_option_title.max' => 'The product option title may not be greater than 255 characters.',
            'type.in' => 'The type must be one of the following values: checkbox, radio, select, label.',
            'position.string' => 'The position must be a string.',
            'position.max' => 'The position may not be greater than 255 characters.',
            'products_id.exists' => 'The selected product does not exist.',
        ];
    }
}
