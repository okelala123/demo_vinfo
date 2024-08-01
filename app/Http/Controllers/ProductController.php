<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequets123;
use App\Http\Requests\ProductInfoRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Prices;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
    
    public function createProductInfo(ProductInfoRequest $request)
    {
        $validatedData = $request->validated();
    
       
        $data = new Product();
        $data->logo = $request->logo;
        $data->code = $request->code;
        $data->name_en = $request->name_en;
        $data->name_vn = $request->name_vn;
        $data->desc_en = $request->desc_en;
        $data->desc_vn = $request->desc_vn;
        $data->slug_en = $request->slug_en;
        $data->slug_vn = $request->slug_vn;
        $data->highlighted_text_en = $request->highlighted_text_en;
        $data->highlighted_text_vn = $request->highlighted_text_vn;
        $data->valid_from = $request->valid_from;
        $data->valid_to = $request->valid_to;
        $data->version = $request->version;
        $data->position = $request->position;
        $data->external_link = $request->external_link;
        $data->activated = $request->activated;
        $data->partnership = $request->partnership;
        $data->lead_capture = $request->lead_capture;
        $data->has_promotion = $request->has_promotion;
        $data->evaluation = $request->evaluation;
        $data->contact_us = $request->contact_us;
        $data->vifo_choice = $request->vifo_choice;
        $data->term_condition_file = $request->term_condition_file;
        $data->detail_file = $request->detail_file;
        $data->product_detail_en = $request->product_detail_en;
        $data->product_detail_vn = $request->product_detail_vn;
        $data->product_family_id  = $request->product_family_id;
        $data->catalog_id  = $request->catalog_id;
        $data->providers_id  = $request->providers_id;
        $data->rank = $request->rank;
        $data->commission   = $request->commission;

        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateProductInfo(ProductInfoRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = Product::find($id);
        // dd($data);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->logo  = $request->filled('logo') ? $request->logo  : $data->logo;
            $data->code  = $request->filled('code') ? $request->code  : $data->code;
            $data->name_en  = $request->filled('name_en') ? $request->name_en  : $data->name_en;
            $data->name_vn  = $request->filled('name_vn') ? $request->name_vn  : $data->name_vn;
            $data->desc_en  = $request->filled('desc_en') ? $request->desc_en  : $data->desc_en;
            $data->desc_vn  = $request->filled('desc_vn') ? $request->desc_vn  : $data->desc_vn;
            $data->slug_en  = $request->filled('slug_en') ? $request->slug_en  : $data->slug_en;
            $data->slug_vn  = $request->filled('slug_vn') ? $request->slug_vn  : $data->slug_vn;
            $data->highlighted_text_en  = $request->filled('highlighted_text_en') ? $request->highlighted_text_en  : $data->highlighted_text_en;
            $data->highlighted_text_vn  = $request->filled('highlighted_text_vn') ? $request->highlighted_text_vn  : $data->highlighted_text_vn;
            $data->valid_from  = $request->filled('valid_from') ? $request->valid_from  : $data->valid_from;
            $data->valid_to  = $request->filled('valid_to') ? $request->valid_to  : $data->valid_to;
            $data->version  = $request->filled('version') ? $request->version  : $data->version;
            $data->position  = $request->filled('position') ? $request->position  : $data->position;
            $data->external_link  = $request->filled('external_link') ? $request->external_link  : $data->external_link;
            $data->activated  = $request->filled('activated') ? $request->activated  : $data->activated;
            $data->partnership  = $request->filled('partnership') ? $request->partnership  : $data->partnership;
            $data->lead_capture  = $request->filled('lead_capture') ? $request->lead_capture  : $data->lead_capture;
            $data->has_promotion  = $request->filled('has_promotion') ? $request->has_promotion  : $data->has_promotion;
            $data->evaluation  = $request->filled('evaluation') ? $request->evaluation  : $data->evaluation;
            $data->contact_us  = $request->filled('contact_us') ? $request->contact_us  : $data->contact_us;
            $data->vifo_choice  = $request->filled('vifo_choice') ? $request->vifo_choice  : $data->vifo_choice;
            $data->term_condition_file  = $request->filled('term_condition_file') ? $request->term_condition_file  : $data->term_condition_file;
            $data->detail_file  = $request->filled('detail_file') ? $request->detail_file  : $data->detail_file;
            $data->product_detail_en  = $request->filled('product_detail_en') ? $request->product_detail_en  : $data->product_detail_en;
            $data->product_detail_vn  = $request->filled('product_detail_vn') ? $request->product_detail_vn  : $data->product_detail_vn;
            $data->product_family_id  = $request->filled('product_family_id') ? $request->product_family_id  : $data->product_family_id;
            $data->providers_id  = $request->filled('providers_id') ? $request->providers_id  : $data->providers_id;
            $data->rank = $request->filled('rank') ? $request->rank  : $data->rank;
            $data->commission = $request->filled('commission') ? $request->commission  : $data->commission;


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

    public function deleteProductInfo($id)
    {
        $data = Product::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }


    public function searchProductInfo(ProductInfoRequest $request)
    {
        

        $validatedData = $request->validated();
        $query = Product::query();
        // $query = Contact::with('providers'); 

        //search
        if ($request->has('name_vn')) {
            $query->where('name_vn', 'like', '%' . $request->input('name_vn') . '%');
        }
        if ($request->has('name_en')) {
            $query->where('name_en', 'like', '%' . $request->input('name_en') . '%');
        }
        if ($request->has('code')) {
            $query->where('code', 'like', '%' . $request->input('code') . '%');
        }


        //filter 
        if ($request->has('providers_id')) {
            $query->where('providers_id', $request->input('providers_id'));
        }
        if ($request->has('product_family_id')) {
            $query->where('product_family_id', $request->input('product_family_id'));
        }
        if ($request->has('active')) {
            $query->where('activated', $request->input('active'));
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
