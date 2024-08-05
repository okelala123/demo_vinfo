<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eVoucherRequest extends FormRequest
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
            'campaign' => 'string|max:191',
            'code' => 'string|max:191',
            'encrypted_code' => 'string|max:191',
            'product_code' => 'string|max:191',
            'percent' => 'string|max:191',
            'max_min' => 'string|max:191',
            'product_name' => 'string|max:191',
            'status' => 'string|max:191',
            'oder_no' => 'string|max:191',
            'reusable' => 'string|max:191',
            'evoucher_for_zalo_mini_app' => 'string|max:191',
            'qr_code_base_url' => 'string|max:191',
            'apply_to_all_products' => 'string|max:191',
            'quantity' => 'string|max:191',
            'start_from' => 'date_format:Y-m-d',
            'start_to' => 'date_format:Y-m-d|after_or_equal:start_from',
            'product_family_id' => 'exists:product_families,id',
            'providers_id' => 'exists:providers,id',
            'rank_id' => 'exists:ranks,id',
            'distributors_organizations_id' => 'exists:distributors_organizations,id',
            'zalo_mini_app_id' => 'exists:zalo_mini_apps,id',
            'update_time' => 'date_format:Y-m-d',
        ];
    }
}
