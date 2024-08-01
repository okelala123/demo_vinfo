<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributorSettingRequest;
use App\Models\DistributorSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorSettingController extends Controller
{
    //
    public function createDisSetting(DistributorSettingRequest $request)
    {
        $validatedData = $request->validated();


        $data = new DistributorSetting();
        $data->enable_orc =$request->enable_orc;
        $data->show_term_condition =$request->show_term_condition;
        $data->commission_deduct = $request->commission_deduct;
        $data->commission_show = $request->commission_show;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
 
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateDisSetting(DistributorSettingRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = DistributorSetting::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->enable_orc  = $request->filled('enable_orc') ? $request->enable_orc  : $data->enable_orc;
            $data->show_term_condition  = $request->filled('show_term_condition') ? $request->show_term_condition  : $data->show_term_condition;
            $data->commission_deduct  = $request->filled('commission_deduct') ? $request->commission_deduct  : $data->commission_deduct;
            $data->commission_show  = $request->filled('commission_show') ? $request->commission_show  : $data->commission_show;
            $data->distributors_organizations_id  = $request->filled('distributors_organizations_id') ? $request->distributors_organizations_id  : $data->distributors_organizations_id;
          
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

    public function deleteDisSetting($id)
    {
        $data = DistributorSetting::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
