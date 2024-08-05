<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidDayRequest extends FormRequest
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
            'valid_day_after' => 'integer|min:0',
            'product_family_id' => 'exists:product_families,id',
            'providers_id' => 'exists:providers,id',
        ];
    }
}
