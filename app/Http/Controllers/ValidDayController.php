<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidDayRequest;
use App\Models\ValidDay;
use Illuminate\Http\Request;

class ValidDayController extends Controller
{
    //
    public function createValidDay(ValidDayRequest $request)
    {

        $validatedData = $request->validated();
    
        $data = new ValidDay();
        $data->valid_day_after =$request->valid_day_after;
        $data->product_family_id =$request->product_family_id;
        $data->providers_id = $request->providers_id;
     


        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateValidDay(ValidDayRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = ValidDay::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->valid_day_after  = $request->filled('valid_day_after') ? $request->valid_day_after  : $data->valid_day_after;
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

    public function deleteValidDay($id)
    {
        $data = ValidDay::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    
 

 
}
