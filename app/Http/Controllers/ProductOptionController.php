<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductOptionRequest;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductOptionController extends Controller
{
    //
    public function createProductOption(ProductOptionRequest $request)
    {
       
        $validatedData = $request->validated();


        $data = new ProductOption();
        $data->product_option_title =$request->product_option_title;
        $data->type =$request->type;
        $data->position = $request->position;
        $data->label = $request->label;
        $data->price = $request->price;
        $data->percent = $request->percent;
        $data->sku = $request->sku;
        $data->position_property = $request->position_property;
        $data->no_tax = $request->no_tax;
        $data->pre_check = $request->pre_check;
        $data->products_id = $request->products_id;
        
     
  
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateProductOption(Request $request, $id)
    {


        $data = ProductOption::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->product_option_title  = $request->filled('product_option_title') ? $request->product_option_title  : $data->product_option_title;
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->position  = $request->filled('position') ? $request->position  : $data->position;
            $data->products_id  = $request->filled('products_id') ? $request->products_id  : $data->products_id;
     
        

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

    public function deleteProductOption($id)
    {
        $data = ProductOption::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
