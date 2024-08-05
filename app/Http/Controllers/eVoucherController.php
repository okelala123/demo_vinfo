<?php

namespace App\Http\Controllers;

use App\Http\Requests\eVoucherRequest;
use App\Models\E_voucher;
use Illuminate\Http\Request;

class eVoucherController extends Controller
{
    //
    public function createVouCher(eVoucherRequest $request)
    {

        $validatedData = $request->validated();
    
        $data = new E_voucher();
        $data->campaign =$request->campaign;
        $data->code =$request->code;
        $data->encrypted_code = $request->encrypted_code;
        $data->product_code = $request->product_code;
        $data->percent = $request->percent;
        $data->max_min = $request->max_min;
        $data->product_name = $request->product_name;
        $data->status = $request->status;
        $data->oder_no = $request->oder_no;
        $data->reusable = $request->reusable;
        $data->evoucher_for_zalo_mini_app = $request->evoucher_for_zalo_mini_app;
        $data->qr_code_base_url = $request->qr_code_base_url;
        $data->apply_to_all_products = $request->apply_to_all_products;
        $data->quantity = $request->quantity;
        $data->start_from = $request->start_from;
        $data->start_to = $request->start_to;
        $data->product_family_id = $request->product_family_id;
        $data->providers_id = $request->providers_id;
        $data->rank_id = $request->rank_id;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->zalo_mini_app_id = $request->zalo_mini_app_id;


        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateVouCher(eVoucherRequest $request, $id)
    {
        // $validatedData = $request->validated();


        $data = E_voucher::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->campaign  = $request->filled('campaign') ? $request->campaign  : $data->campaign;
            $data->code  = $request->filled('code') ? $request->code  : $data->code;
            $data->encrypted_code  = $request->filled('encrypted_code') ? $request->encrypted_code  : $data->encrypted_code;
            $data->product_code  = $request->filled('product_code') ? $request->product_code  : $data->product_code;
            $data->percent  = $request->filled('percent') ? $request->percent  : $data->percent;
            $data->max_min  = $request->filled('max_min') ? $request->max_min  : $data->max_min;
            $data->product_name  = $request->filled('product_name') ? $request->product_name  : $data->product_name;
            $data->status  = $request->filled('status') ? $request->status  : $data->status;
            $data->oder_no  = $request->filled('oder_no') ? $request->oder_no  : $data->oder_no;
            $data->reusable  = $request->filled('reusable') ? $request->reusable  : $data->reusable;
            $data->evoucher_for_zalo_mini_app  = $request->filled('evoucher_for_zalo_mini_app') ? $request->evoucher_for_zalo_mini_app  : $data->evoucher_for_zalo_mini_app;
            $data->qr_code_base_url  = $request->filled('qr_code_base_url') ? $request->qr_code_base_url  : $data->qr_code_base_url;
            $data->apply_to_all_products  = $request->filled('apply_to_all_products') ? $request->apply_to_all_products  : $data->apply_to_all_products;
            $data->quantity  = $request->filled('quantity') ? $request->quantity  : $data->quantity;
            $data->start_from  = $request->filled('start_from') ? $request->start_from  : $data->start_from;
            $data->start_to  = $request->filled('start_to') ? $request->start_to  : $data->start_to;
            $data->product_family_id  = $request->filled('product_family_id') ? $request->product_family_id  : $data->product_family_id;
            $data->providers_id  = $request->filled('providers_id') ? $request->providers_id  : $data->providers_id;
            $data->rank_id  = $request->filled('rank_id') ? $request->rank_id  : $data->rank_id;
            $data->distributors_organizations_id  = $request->filled('distributors_organizations_id') ? $request->distributors_organizations_id  : $data->distributors_organizations_id;
            $data->zalo_mini_app_id  = $request->filled('zalo_mini_app_id') ? $request->zalo_mini_app_id  : $data->zalo_mini_app_id;
            $data->update_time  = $request->filled('update_time') ? $request->now()->format('Y-m-d')  : $data->update_time;    

         
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

    public function deleteVouCher($id)
    {
        $data = E_voucher::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    


    public function searchVouCher(Request $request)
    {

        $query = E_voucher::query();
        //search
        if ($request->has('campaign')) {
            $query->where('campaign', 'like', '%' . $request->input('campaign') . '%');
        }
     
        if ($request->has('code')) {
            $query->where('code', 'like', '%' . $request->input('code') . '%');
        }
        if ($request->has('start_from')) {
            $query->where('start_from', 'like', '%' . $request->input('start_from') . '%');
        }
        if ($request->has('start_to')) {
            $query->where('start_to', 'like', '%' . $request->input('start_to') . '%');
        }
      
         //filter 

        
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->has('providers_id')) {
            $query->where('providers_id', $request->input('providers_id'));
        }
        if ($request->has('distributors_organizations_id')) {
            $query->where('distributors_organizations_id', $request->input('distributors_organizations_id'));
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
