<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFamilyRequest extends FormRequest
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
             'logo' => 'string|max:255',
            'name_en' => 'string|max:255',
            'name_vn' => 'string|max:255',
            'desc' => 'string',
            'slug_en' => 'string|max:255',
            'slug_vn' => 'string|max:255',
            'promotion_text_vn' => 'string',
            'promotion_text_en' => 'string',
            'catalog_id' => 'integer',
            'valid_after' => 'integer',
            'product_family_code' => 'string|max:255',
            'position' => 'string|max:255',
            'product_family_banner' => 'string|max:255',
            'product_family_banner_promotion' => 'string|max:255',
            'order_template_upload' => 'string|max:255',
            'has_beneficiary' => 'in:active,inactive',
            'is_allow_send_sms' => 'in:active,inactive',
            'is_disable_reminder' => 'in:active,inactive',
            'sms_content' => 'string',
            ];
        }

        /**
         *
         * @return array
         */
        public function messages()
        {
            return [
                'logo.string' => 'Logo must be a string.',
                'logo.max' => 'Logo may not be greater than 255 characters.',
                'name_en.string' => 'Name (English) must be a string.',
                'name_en.max' => 'Name (English) may not be greater than 255 characters.',
                'name_vn.string' => 'Name (Vietnamese) must be a string.',
                'name_vn.max' => 'Name (Vietnamese) may not be greater than 255 characters.',
                'desc.string' => 'Description must be a string.',
                'slug_en.string' => 'Slug (English) must be a string.',
                'slug_en.max' => 'Slug (English) may not be greater than 255 characters.',
                'slug_vn.string' => 'Slug (Vietnamese) must be a string.',
                'slug_vn.max' => 'Slug (Vietnamese) may not be greater than 255 characters.',
                'promotion_text_vn.string' => 'Promotion text (Vietnamese) must be a string.',
                'promotion_text_en.string' => 'Promotion text (English) must be a string.',
                'catalog_id.integer' => 'Catalog ID must be an integer.',
                'valid_after.integer' => 'Valid after must be an integer.',
                'product_family_code.string' => 'Product family code must be a string.',
                'product_family_code.max' => 'Product family code may not be greater than 255 characters.',
                'position.string' => 'Position must be a string.',
                'position.max' => 'Position may not be greater than 255 characters.',
                'product_family_banner.string' => 'Product family banner must be a string.',
                'product_family_banner.max' => 'Product family banner may not be greater than 255 characters.',
                'product_family_banner_promotion.string' => 'Product family banner promotion must be a string.',
                'product_family_banner_promotion.max' => 'Product family banner promotion may not be greater than 255 characters.',
                'order_template_upload.string' => 'Order template upload must be a string.',
                'order_template_upload.max' => 'Order template upload may not be greater than 255 characters.',
                'has_beneficiary.in' => 'Has beneficiary must be either active or inactive.',
                'is_allow_send_sms.in' => 'Is allow send SMS must be either active or inactive.',
                'is_disable_reminder.in' => 'Is disable reminder must be either active or inactive.',
                'sms_content.string' => 'SMS content must be a string.',
            ];
        }
}
