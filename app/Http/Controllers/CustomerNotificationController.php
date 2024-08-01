<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\CustomerNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerNotificationController extends Controller
{
    //
    public function createCustomer(CustomerRequest $request)
    {
        $validatedData = $request->validated();

        $data = new CustomerNotification();
        $data->send_email =$request->send_email;
        $data->allow_send_sms =$request->allow_send_sms;
        $data->is_from_provider_banrd = $request->is_from_provider_banrd;
        $data->sms_brand_name = $request->sms_brand_name;
        $data->sms_api_username = $request->sms_api_username;
        $data->sms_api_password = $request->sms_api_password;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateCustomer(CustomerRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = CustomerNotification::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->send_email  = $request->filled('send_email') ? $request->send_email  : $data->send_email;
            $data->allow_send_sms  = $request->filled('allow_send_sms') ? $request->allow_send_sms  : $data->allow_send_sms;
            $data->is_from_provider_banrd  = $request->filled('is_from_provider_banrd') ? $request->is_from_provider_banrd  : $data->is_from_provider_banrd;
            $data->sms_brand_name  = $request->filled('sms_brand_name') ? $request->sms_brand_name  : $data->sms_brand_name;
            $data->sms_api_username  = $request->filled('sms_api_username') ? $request->sms_api_username  : $data->sms_api_username;
            $data->sms_api_password  = $request->filled('sms_api_password') ? $request->sms_api_password  : $data->sms_api_password;

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

    public function deleteCustomer($id)
    {
        $data = CustomerNotification::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
