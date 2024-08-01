<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiscountsRequest;
use App\Models\Discounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscountsController extends Controller
{
    //
    public function createDiscounts(DiscountsRequest $request)
    {
        $validatedData = $request->validated();

        $data = new Discounts();
        $data->type =$request->type;
        $data->type_discount =$request->type_discount;
        $data->type_value = $request->type_value;
        $data->quantity_discount = $request->quantity_discount;
        $data->quantity_value = $request->quantity_value;
        $data->products_id  = $request->products_id;
        $data->prices_id   = $request->prices_id;
  
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateDiscounts(DiscountsRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = Discounts::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->type_discount  = $request->filled('type_discount') ? $request->type_discount  : $data->type_discount;
            $data->type_value  = $request->filled('type_value') ? $request->type_value  : $data->type_value;
            $data->quantity_discount  = $request->filled('quantity_discount') ? $request->quantity_discount  : $data->quantity_discount;
            $data->quantity_value  = $request->filled('quantity_value') ? $request->quantity_value  : $data->quantity_value;
            $data->products_id  = $request->filled('products_id') ? $request->products_id  : $data->products_id;
            $data->prices_id  = $request->filled('prices_id') ? $request->prices_id  : $data->prices_id;
     
        

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

    public function deleteDiscounts($id)
    {
        $data = Discounts::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
