<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributorPromotionRequest;
use App\Models\DistributorPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorPromotionController extends Controller
{
    //
    public function createDisPromotion(DistributorPromotionRequest $request)
    {

        $validatedData = $request->validated();


        $data = new DistributorPromotion();
        $data->type =$request->type;
        $data->homepage_desktop =$request->homepage_desktop;
        $data->homepage_moblie = $request->homepage_moblie;
        $data->collection_desktop = $request->collection_desktop;
        $data->collection_moblie = $request->collection_moblie;
        $data->collection_icon = $request->collection_icon;
        $data->payment_desktop = $request->payment_desktop;
        $data->payment_moblie = $request->payment_moblie;
        $data->payment_icon = $request->payment_icon;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateDisPromotion(DistributorPromotionRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = DistributorPromotion::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->homepage_desktop  = $request->filled('homepage_desktop') ? $request->homepage_desktop  : $data->homepage_desktop;
            $data->homepage_moblie  = $request->filled('homepage_moblie') ? $request->homepage_moblie  : $data->homepage_moblie;
            $data->collection_desktop  = $request->filled('collection_desktop') ? $request->collection_desktop  : $data->collection_desktop;
            $data->collection_moblie  = $request->filled('collection_moblie') ? $request->collection_moblie  : $data->collection_moblie;
            $data->collection_icon  = $request->filled('collection_icon') ? $request->collection_icon  : $data->collection_icon;
            $data->payment_desktop  = $request->filled('payment_desktop') ? $request->payment_desktop  : $data->payment_desktop;
            $data->payment_moblie  = $request->filled('payment_moblie') ? $request->payment_moblie  : $data->payment_moblie;
            $data->payment_icon  = $request->filled('payment_icon') ? $request->payment_icon  : $data->payment_icon;
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

    public function deleteDisPromotion($id)
    {
        $data = DistributorPromotion::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
