<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComissionTableRequest;
use App\Models\CommissionTableLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComissionTableController extends Controller
{
    //
    public function createDisComission(ComissionTableRequest $request)
    {
        $validatedData = $request->validated();

        $validator = Validator::make($request->all(), [
     

        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new CommissionTableLevel();
        $data->providers_id =$request->providers_id;
        $data->product_family_id =$request->product_family_id;
        $data->ranks_id = $request->ranks_id;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->level_1 = $request->level_1;
        $data->level_2 = $request->level_2;
        $data->level_3 = $request->level_3;
        $data->level_4 = $request->level_4;
        $data->level_5 = $request->level_5;
        $data->enable = $request->enable;
    

        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateDisComission(ComissionTableRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = CommissionTableLevel::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->providers_id  = $request->filled('providers_id') ? $request->providers_id  : $data->providers_id;
            $data->product_family_id  = $request->filled('product_family_id') ? $request->product_family_id  : $data->product_family_id;
            $data->ranks_id  = $request->filled('ranks_id') ? $request->ranks_id  : $data->ranks_id;
            $data->distributors_organizations_id  = $request->filled('distributors_organizations_id') ? $request->distributors_organizations_id  : $data->distributors_organizations_id;

            $data->level_1  = $request->filled('level_1') ? $request->level_1  : $data->level_1;
            $data->level_2  = $request->filled('level_2') ? $request->level_2  : $data->level_2;
            $data->level_3  = $request->filled('level_3') ? $request->level_3  : $data->level_3;
            $data->level_4  = $request->filled('level_4') ? $request->level_4  : $data->level_4;
            $data->level_5  = $request->filled('level_5') ? $request->level_5  : $data->level_5;
            $data->enable  = $request->filled('enable') ? $request->enable  : $data->enable;

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

    public function deleteDisComission($id)
    {
        $data = CommissionTableLevel::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
