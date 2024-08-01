<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendZaloRequest;
use App\Models\SendZalo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SendZaloController extends Controller
{
    //
    public function createSendZalo(SendZaloRequest $request)
    {
        $validatedData = $request->validated();

      

        $data = new SendZalo();
        $data->type_send_zalo =$request->type_send_zalo;
        $data->zalo_oa_id =$request->zalo_oa_id;
        $data->zalo_api_key = $request->zalo_api_key;
        $data->zalo_api_secret = $request->zalo_api_secret;
        $data->template_id = $request->template_id;
        $data->type = $request->type;
        $data->customer_notifications_id = $request->customer_notifications_id;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateSendZalo(SendZaloRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = SendZalo::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->type_send_zalo  = $request->filled('type_send_zalo') ? $request->type_send_zalo  : $data->type_send_zalo;
            $data->zalo_oa_id  = $request->filled('zalo_oa_id') ? $request->zalo_oa_id  : $data->zalo_oa_id;
            $data->zalo_api_key  = $request->filled('zalo_api_key') ? $request->zalo_api_key  : $data->zalo_api_key;
            $data->zalo_api_secret  = $request->filled('zalo_api_secret') ? $request->zalo_api_secret  : $data->zalo_api_secret;
            $data->template_id  = $request->filled('template_id') ? $request->template_id  : $data->template_id;
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->customer_notifications_id  = $request->filled('customer_notifications_id') ? $request->customer_notifications_id  : $data->customer_notifications_id;

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

    public function deleteSendZalo($id)
    {
        $data = SendZalo::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
