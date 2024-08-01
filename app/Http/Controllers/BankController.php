<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    //
    public function createBank(BankRequest $request)
    {
        $validatedData = $request->validated();


        $data = new Bank();
        $data->type =$request->type;
        $data->bank_code =$request->bank_code;
        $data->account_name = $request->account_name;
        $data->account_prefix = $request->account_prefix;
        $data->is_non_billing_virtual_account = $request->is_non_billing_virtual_account;
        $data->allowed_account_name = $request->allowed_account_name;
        $data->base_account = $request->base_account;
        $data->client_id = $request->client_id;
        $data->client_secret = $request->client_secret;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->certificate = $request->certificate;
        $data->signature_private_key = $request->signature_private_key;
        $data->payment_info_id = $request->payment_info_id;
        $data->distributors_organizations_id = $request->distributors_organizations_id;
        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateBank(BankRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = Bank::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->type  = $request->filled('type') ? $request->type  : $data->type;
            $data->bank_code  = $request->filled('bank_code') ? $request->bank_code  : $data->bank_code;
            $data->account_name  = $request->filled('account_name') ? $request->account_name  : $data->account_name;
            $data->account_prefix  = $request->filled('account_prefix') ? $request->account_prefix  : $data->account_prefix;
            $data->is_non_billing_virtual_account  = $request->filled('is_non_billing_virtual_account') ? $request->is_non_billing_virtual_account  : $data->is_non_billing_virtual_account;
            $data->is_non_billing_virtual_account  = $request->filled('is_non_billing_virtual_account') ? $request->is_non_billing_virtual_account  : $data->is_non_billing_virtual_account;
            $data->base_account  = $request->filled('base_account') ? $request->base_account  : $data->base_account;
            $data->client_id  = $request->filled('client_id') ? $request->client_id  : $data->client_id;
            $data->client_secret  = $request->filled('client_secret') ? $request->client_secret  : $data->client_secret;
            $data->client_secret  = $request->filled('client_secret') ? $request->client_secret  : $data->client_secret;
            $data->client_secret  = $request->filled('client_secret') ? $request->client_secret  : $data->client_secret;
            $data->client_secret  = $request->filled('client_secret') ? $request->client_secret  : $data->client_secret;
            $data->signature_private_key  = $request->filled('signature_private_key') ? $request->signature_private_key  : $data->signature_private_key;
            $data->payment_info_id  = $request->filled('payment_info_id') ? $request->payment_info_id  : $data->payment_info_id;
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

    public function deleteBank($id)
    {
        $data = Bank::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
