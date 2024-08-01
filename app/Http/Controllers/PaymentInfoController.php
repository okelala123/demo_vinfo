<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\PaymentInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentInfoController extends Controller
{
    //
    public function createPayment(PaymentRequest $request)
    {
        $validatedData = $request->validated();

     

        $data = new PaymentInfo();
        $data->enable_liabilities =$request->enable_liabilities;
        $data->saleman_min_level =$request->saleman_min_level;
        $data->enable_wallet = $request->enable_wallet;
        $data->type_bank = $request->type_bank;
        $data->bank_name = $request->bank_name;
        $data->bank_branch = $request->bank_branch;
        $data->account_name = $request->account_name;
        $data->account_number = $request->account_number;
        $data->token_key = $request->token_key;
        $data->encrypt_key = $request->encrypt_key;
        $data->checksum_key = $request->checksum_key;
        $data->website_key = $request->website_key;
        $data->checksum_secret = $request->checksum_secret;
        $data->bank_code = $request->bank_code;
        $data->merchant_key = $request->merchant_key;
        $data->key = $request->key;
        $data->secure_secret_key = $request->secure_secret_key;
        $data->partner_code = $request->partner_code;
        $data->api_key = $request->api_key;
        $data->secret_key = $request->secret_key;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updatePayment(PaymentRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = PaymentInfo::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->enable_liabilities  = $request->filled('enable_liabilities') ? $request->enable_liabilities  : $data->enable_liabilities;
            $data->saleman_min_level  = $request->filled('saleman_min_level') ? $request->saleman_min_level  : $data->saleman_min_level;
            $data->enable_wallet  = $request->filled('enable_wallet') ? $request->enable_wallet  : $data->enable_wallet;
            $data->type_bank  = $request->filled('type_bank') ? $request->type_bank  : $data->type_bank;
            $data->bank_name  = $request->filled('bank_name') ? $request->bank_name  : $data->bank_name;
            $data->bank_branch  = $request->filled('bank_branch') ? $request->bank_branch  : $data->bank_branch;
            $data->account_name  = $request->filled('account_name') ? $request->account_name  : $data->account_name;
            $data->account_number  = $request->filled('account_number') ? $request->account_number  : $data->account_number;
            $data->token_key  = $request->filled('token_key') ? $request->token_key  : $data->token_key;
            $data->encrypt_key  = $request->filled('encrypt_key') ? $request->encrypt_key  : $data->encrypt_key;
            $data->checksum_key  = $request->filled('checksum_key') ? $request->checksum_key  : $data->checksum_key;
            $data->website_key  = $request->filled('website_key') ? $request->website_key  : $data->website_key;
            $data->checksum_secret  = $request->filled('checksum_secret') ? $request->checksum_secret  : $data->checksum_secret;
            $data->bank_code  = $request->filled('bank_code') ? $request->bank_code  : $data->bank_code;
            $data->merchant_key  = $request->filled('merchant_key') ? $request->merchant_key  : $data->merchant_key;
            $data->key  = $request->filled('key') ? $request->key  : $data->key;
            $data->secure_secret_key  = $request->filled('secure_secret_key') ? $request->secure_secret_key  : $data->secure_secret_key;
            $data->partner_code  = $request->filled('partner_code') ? $request->partner_code  : $data->partner_code;
            $data->api_key  = $request->filled('api_key') ? $request->api_key  : $data->api_key;
            $data->secret_key  = $request->filled('secret_key') ? $request->secret_key  : $data->secret_key;
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

    public function deletePayment($id)
    {
        $data = PaymentInfo::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
