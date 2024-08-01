<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\Prices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PricesController extends Controller
{
    public function createPrices(PriceRequest $request)
    {
        $validatedData = $request->validated();
       
        $data = new Prices();
        $data->type =$request->type;
        $data->exc_tax_price = $request->exc_tax_price;
        $data->inc_tax_price = $request->inc_tax_price;
        $data->extra_price = $request->extra_price;
        $data->products_id  = $request->products_id;

        $data->save();

        return response()->json(['message' => 'successfully']);
    }


    public function updatePrices(PriceRequest $request, $id)
    {
        $validatedData = $request->validated();
       

        $data = Prices::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->exc_tax_price  = $request->filled('exc_tax_price') ? $request->exc_tax_price  : $data->exc_tax_price;
            $data->inc_tax_price  = $request->filled('inc_tax_price') ? $request->inc_tax_price  : $data->inc_tax_price;
            $data->extra_price  = $request->filled('extra_price') ? $request->extra_price  : $data->extra_price;
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

    public function deletePrices($id)
    {
        $data = Prices::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
