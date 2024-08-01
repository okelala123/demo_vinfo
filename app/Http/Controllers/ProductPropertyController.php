<?php

namespace App\Http\Controllers;

use App\Models\ProductProperty;
use Illuminate\Http\Request;

class ProductPropertyController extends Controller
{
    public function createProductProperty(Request $request)
    {
        $data = new ProductProperty();
        $data->label =$request->label;
        $data->price =$request->price;
        $data->percent = $request->percent;
        $data->precheck = $request->precheck;
        $data->benefit_amount = $request->benefit_amount;
        $data->position = $request->position;
        $data->sku = $request->sku;
        $data->type = $request->type;
        $data->type = $request->type;
        $data->type = $request->type;
        $data->type = $request->type;
        $data->type = $request->type;
        $data->product_options_id = $request->product_options_id;
        $data->products_id = $request->products_id;
        
     
  
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateProductProperty(Request $request, $id)
    {


        $data = ProductProperty::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->label  = $request->filled('label') ? $request->label  : $data->label;
            $data->price  = $request->filled('price') ? $request->price  : $data->price;
            $data->percent  = $request->filled('percent') ? $request->percent  : $data->percent;
            $data->precheck  = $request->filled('precheck') ? $request->precheck  : $data->precheck;
            $data->benefit_amount  = $request->filled('benefit_amount') ? $request->benefit_amount  : $data->benefit_amount;
            $data->position  = $request->filled('position') ? $request->position  : $data->position;
            $data->sku  = $request->filled('sku') ? $request->sku  : $data->sku;
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->products_id  = $request->filled('products_id') ? $request->products_id  : $data->products_id;
            $data->product_options_id  = $request->filled('product_options_id') ? $request->product_options_id  : $data->product_options_id;

     
        

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

    public function deleteProductProperty($id)
    {
        $data = ProductProperty::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
