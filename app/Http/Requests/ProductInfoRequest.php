<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductInfoRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có quyền gửi yêu cầu này hay không.
     *
     * @return bool
     */
    public function authorize()
    {

        // Trả về true nếu tất cả người dùng đều có quyền gửi yêu cầu này
        return true;
    }

    /**
     * Xác định các quy tắc xác thực cho yêu cầu.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name_en' => 'string|max:255',
            'name_vn' => 'string|max:255',
            'desc_en' => 'string|max:1000',
            'desc_vn' => 'string|max:1000',
            'slug_en' => 'string|max:255',
            'slug_vn' => 'string|max:255',
            'version' => 'string|max:100',
        ];
    }

    /**
     * Các thông báo lỗi tùy chỉnh cho các quy tắc xác thực.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name_en.string' => 'The English name must be a string.',
            'name_en.max' => 'The English name may not be greater than 255 characters.',
            'name_vn.string' => 'The Vietnamese name must be a string.',
            'name_vn.max' => 'The Vietnamese name may not be greater than 255 characters.',
            'desc_en.string' => 'The English description must be a string.',
            'desc_en.max' => 'The English description may not be greater than 1000 characters.',
            'desc_vn.string' => 'The Vietnamese description must be a string.',
            'desc_vn.max' => 'The Vietnamese description may not be greater than 1000 characters.',
            'slug_en.string' => 'The English slug must be a string.',
            'slug_en.max' => 'The English slug may not be greater than 255 characters.',
            'slug_vn.string' => 'The Vietnamese slug must be a string.',
            'slug_vn.max' => 'The Vietnamese slug may not be greater than 255 characters.',
            'version.string' => 'The version must be a string.',
            'version.max' => 'The version may not be greater than 100 characters.',
        ];
    }
}
