<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributorRequest;
use App\Models\DistributorOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorOrganizationController extends Controller
{
    public function createDistributor(DistributorRequest $request)
    {
        $validatedData = $request->validated();

        $data = new DistributorOrganization();
        $data->code =$request->code;
        $data->logo =$request->logo;
        $data->name = $request->name;
        $data->email_customer_services = $request->email_customer_services;
        $data->email_accountant = $request->email_accountant;
        $data->phone_1 = $request->phone_1;
        $data->phone_2 = $request->phone_2;
        $data->website = $request->website;
        $data->desc = $request->desc;
        $data->accent_color = $request->accent_color;
        $data->text_color = $request->text_color;
        $data->button_color = $request->button_color;
        $data->ocr_provider = $request->ocr_provider;
        $data->is_allow = $request->is_allow;
        $data->is_enable = $request->is_enable;
        $data->signing_key = $request->signing_key;
        $data->webhook_endpoint = $request->webhook_endpoint;
        $data->desktop_footer_en = $request->desktop_footer_en;
        $data->desktop_footer_vn = $request->desktop_footer_vn;
        $data->moblie_footer_en = $request->moblie_footer_en;
        $data->moblie_footer_vn = $request->moblie_footer_vn;
        $data->product_family_id = $request->product_family_id;
        $data->providers_id = $request->providers_id;
        $data->catalog_id = $request->catalog_id;
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateDistributor(DistributorRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = DistributorOrganization::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->code  = $request->filled('code') ? $request->code  : $data->code;
            $data->logo  = $request->filled('logo') ? $request->logo  : $data->logo;
            $data->name  = $request->filled('name') ? $request->name  : $data->name;
            $data->email_customer_services  = $request->filled('email_customer_services') ? $request->email_customer_services  : $data->email_customer_services;
            $data->email_accountant  = $request->filled('email_accountant') ? $request->email_accountant  : $data->email_accountant;
            $data->phone_1  = $request->filled('phone_1') ? $request->phone_1  : $data->phone_1;
            $data->phone_2  = $request->filled('phone_2') ? $request->phone_2  : $data->phone_2;
            $data->website  = $request->filled('website') ? $request->website  : $data->website;
            $data->desc  = $request->filled('desc') ? $request->desc  : $data->desc;
            $data->accent_color  = $request->filled('accent_color') ? $request->accent_color  : $data->accent_color;
            $data->text_color  = $request->filled('text_color') ? $request->text_color  : $data->text_color;
            $data->button_color  = $request->filled('button_color') ? $request->button_color  : $data->button_color;
            $data->ocr_provider  = $request->filled('ocr_provider') ? $request->ocr_provider  : $data->ocr_provider;
            $data->is_allow  = $request->filled('is_allow') ? $request->is_allow  : $data->is_allow;
            $data->is_enable  = $request->filled('is_enable') ? $request->is_enable  : $data->is_enable;
            $data->signing_key  = $request->filled('signing_key') ? $request->signing_key  : $data->signing_key;
            $data->webhook_endpoint  = $request->filled('webhook_endpoint') ? $request->webhook_endpoint  : $data->webhook_endpoint;
            $data->product_family_id  = $request->filled('product_family_id') ? $request->product_family_id  : $data->product_family_id;
            $data->providers_id  = $request->filled('providers_id') ? $request->providers_id  : $data->providers_id;

     
        

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

    public function deleteDistributor($id)
    {
        $data = DistributorOrganization::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function sreachDistributor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:30',
            'code' => 'nullable|string|max:30',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $query = DistributorOrganization::query();
        //search
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('code')) {
            $query->where('code', 'like', '%' . $request->input('code') . '%');
        }
        //filter 
  

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
