<?php

namespace App\Http\Controllers;

use App\Http\Requests\TPARequest;
use App\Models\TPA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TpaController extends Controller
{
    //
    public function createTPA(TPARequest $request)
    {

        $validatedData = $request->validated();
    
        $data = new TPA();
        $data->tpa_code =$request->tpa_code;
        $data->tpa_logo =$request->tpa_logo;
        $data->tpa_name = $request->tpa_name;
        $data->tpa_email = $request->tpa_email;
        $data->tpa_phone = $request->tpa_phone;
        $data->tpa_desc = $request->tpa_desc;
        $data->product_family_id = $request->product_family_id;
        $data->providers_id = $request->providers_id;


        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateTPA(TPARequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = TPA::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->tpa_code  = $request->filled('tpa_code') ? $request->tpa_code  : $data->tpa_code;
            $data->tpa_logo  = $request->filled('tpa_logo') ? $request->tpa_logo  : $data->tpa_logo;
            $data->tpa_name  = $request->filled('tpa_name') ? $request->tpa_name  : $data->tpa_name;
            $data->tpa_email  = $request->filled('tpa_email') ? $request->tpa_email  : $data->tpa_email;
            $data->tpa_phone  = $request->filled('tpa_phone') ? $request->tpa_phone  : $data->tpa_phone;
            $data->tpa_desc  = $request->filled('tpa_desc') ? $request->tpa_desc  : $data->tpa_desc;
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

    public function deleteTPA($id)
    {
        $data = TPA::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    


    public function searchTPA(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tpa_code' => 'nullable|string|max:30',
            'tpa_name' => 'nullable|string|max:30',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $query = TPA::query();
        //search
        if ($request->has('tpa_code')) {
            $query->where('tpa_code', 'like', '%' . $request->input('tpa_code') . '%');
        }
        if ($request->has('tpa_name')) {
            $query->where('tpa_name', 'like', '%' . $request->input('tpa_name') . '%');
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
