<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFamilyRequest;
use App\Models\Catalog;
use Illuminate\Http\Request;
use App\Models\ProductFamily;
use Illuminate\Support\Facades\Validator;

class ProductFamilyController extends Controller
{
    public function getAllProductFamily()
    {
        $products = ProductFamily::all();
        // dd($products);
        return response()->json($products);
    }

    public function createProductFamily(ProductFamilyRequest $request)
    {
        
        $validatedData = $request->validated();
        // dd($validatedData);
        $data = new ProductFamily();
        $data->logo = $request->logo;
        $data->name_en = $request->name_en;
        $data->name_vn = $request->name_vn;
        $data->desc = $request->desc;
        $data->slug_en = $request->slug_en;
        $data->slug_vn = $request->slug_vn;
        $data->promotion_text_vn = $request->promotion_text_vn;
        $data->promotion_text_en = $request->promotion_text_en;
        $data->catalog_id = $request->catalog_id;
        $data->valid_after = $request->valid_after;
        $data->product_family_code = $request->product_family_code;
        $data->position = $request->position;
        $data->product_family_banner = $request->product_family_banner;
        $data->product_family_banner_promotion = $request->product_family_banner_promotion;
        $data->order_template_upload = $request->order_template_upload;
        $data->has_beneficiary = $request->has_beneficiary;
        $data->is_allow_send_sms = $request->is_allow_send_sms;
        $data->is_disable_reminder = $request->is_disable_reminder;
        $data->sms_content = $request->sms_content;


        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateProductFamily(ProductFamilyRequest $request, $id)
    {
        $validatedData = $request->validated();

        $data = ProductFamily::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->logo = $request->filled('logo') ? $request->logo : $data->logo;
            $data->name_en = $request->filled('name_en') ? $request->name_en : $data->name_en;
            $data->name_vn = $request->filled('name_vn') ? $request->name_vn : $data->name_vn;
            $data->desc = $request->filled('desc') ? $request->desc : $data->desc;
            $data->slug_en = $request->filled('slug_en') ? $request->slug_en : $data->slug_en;
            $data->slug_vn = $request->filled('slug_vn') ? $request->slug_vn : $data->slug_vn;
            $data->promotion_text_vn = $request->filled('promotion_text_vn') ? $request->promotion_text_vn : $data->promotion_text_vn;
            $data->promotion_text_en = $request->filled('promotion_text_en') ? $request->promotion_text_en : $data->promotion_text_en;
            $data->catalog_id = $request->filled('catalog_id') ? $request->catalog_id : $data->catalog_id;
            $data->valid_after = $request->filled('valid_after') ? $request->valid_after : $data->valid_after;
            $data->product_family_code = $request->filled('product_family_code') ? $request->product_family_code : $data->product_family_code;
            $data->position = $request->filled('position') ? $request->position : $data->position;
            $data->product_family_banner = $request->filled('product_family_banner') ? $request->product_family_banner : $data->product_family_banner;
            $data->product_family_banner_promotion = $request->filled('product_family_banner_promotion') ? $request->product_family_banner_promotion : $data->product_family_banner_promotion;
            $data->order_template_upload = $request->filled('order_template_upload') ? $request->order_template_upload : $data->order_template_upload;
            $data->has_beneficiary = $request->filled('has_beneficiary') ? $request->has_beneficiary : $data->has_beneficiary;
            $data->is_allow_send_sms = $request->filled('is_allow_send_sms') ? $request->is_allow_send_sms : $data->is_allow_send_sms;
            $data->is_disable_reminder = $request->filled('is_disable_reminder') ? $request->is_disable_reminder : $data->is_disable_reminder;
            $data->sms_content = $request->filled('sms_content') ? $request->sms_content : $data->sms_content;


            try {
                $product =   $data->save();
                return response()->json(
                    [
                        'message' => 'Product update successfully',
                        'data' => $product,
                        'errorCode' => 0
                    ]
                );
            } catch (\Exception $e) {
                return response()->json(
                    [
                        'message' => 'FAIL',
                        'errorCode' => 1
                    ]
                );
            }
        }
    }



    public function deleteProductFamily($id)
    {
        $data = ProductFamily::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function inforProductFamily($id)
    {
        $data = ProductFamily::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json(['Product' => $data]);
    }


    public function searchProductFamily(ProductFamilyRequest $request)
    {
        $validatedData = $request->validated();

        $query = ProductFamily::query();
        //search
        if ($request->has('name')) {
            $query->where('name_vn', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('code')) {
            $query->where('product_family_code', 'like', '%' . $request->input('code') . '%');
        }
        //filter 
        if ($request->has('status')) {
            $query->where('has_beneficiary', $request->input('status'));
        }
        if ($request->has('catalog')) {
            $query->where('catalog_id', $request->input('catalog'));
        }

        // $limit = $request->input('limit', 10);
        $limit = 10;
        $products = $query->paginate($limit);

        // dd($query->toSql(), $query->getBindings());
        return response()->json([
            'message' => 'successfully',
            'data' => $products
        ]);
    }
}
