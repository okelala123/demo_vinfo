<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistributorMemberRequest;
use App\Models\DistributorMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorMemberController extends Controller
{
    //
    public function createDisMember(DistributorMemberRequest $request)
    {

        $validatedData = $request->validated();

        $data = new DistributorMember();
        $data->avatar =$request->avatar;
        $data->parent_saleman =$request->parent_saleman;
        $data->phone =$request->phone;
        $data->position = $request->position;
        $data->username = $request->username;
        $data->name = $request->name;
        $data->status = $request->status;
        $data->email = $request->email;
        $data->saleman_level = $request->saleman_level;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->country = $request->country;
        $data->passport_drivelicense = $request->passport_drivelicense;
        $data->id_taxcode = $request->id_taxcode;
        $data->is_freelancer = $request->is_freelancer;
        $data->password = $request->password;
        $data->generate_mini_app_qr = $request->generate_mini_app_qr;
        $data->provider_distributor_code = $request->provider_distributor_code;
        $data->agency_code = $request->agency_code;
        $data->employee_code = $request->employee_code;
        $data->bank = $request->bank;
        $data->account_number = $request->account_number;
        $data->account_name = $request->account_name;
        $data->distributors_organizations_id = $request->distributors_organizations_id;

        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateDisMember(DistributorMemberRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = DistributorMember::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->avatar  = $request->filled('avatar') ? $request->avatar  : $data->avatar;
            $data->phone  = $request->filled('phone') ? $request->phone  : $data->phone;
            $data->position  = $request->filled('position') ? $request->position  : $data->position;
            $data->username  = $request->filled('username') ? $request->username  : $data->username;
            $data->name  = $request->filled('name') ? $request->name  : $data->name;
            $data->status  = $request->filled('status') ? $request->status  : $data->status;
            $data->email  = $request->filled('email') ? $request->email  : $data->email;
            $data->parent_saleman  = $request->filled('parent_saleman') ? $request->parent_saleman  : $data->parent_saleman;
            $data->saleman_level  = $request->filled('saleman_level') ? $request->saleman_level  : $data->saleman_level;
            $data->address  = $request->filled('address') ? $request->address  : $data->address;
            $data->city  = $request->filled('city') ? $request->city  : $data->city;
            $data->country  = $request->filled('country') ? $request->country  : $data->country;
            $data->passport_drivelicense  = $request->filled('passport_drivelicense') ? $request->passport_drivelicense  : $data->passport_drivelicense;
            $data->id_taxcode  = $request->filled('id_taxcode') ? $request->id_taxcode  : $data->id_taxcode;
            $data->is_freelancer  = $request->filled('is_freelancer') ? $request->is_freelancer  : $data->is_freelancer;
            $data->password  = $request->filled('password') ? $request->password  : $data->password;
            $data->generate_mini_app_qr  = $request->filled('generate_mini_app_qr') ? $request->generate_mini_app_qr  : $data->generate_mini_app_qr;
            $data->provider_distributor_code  = $request->filled('provider_distributor_code') ? $request->provider_distributor_code  : $data->provider_distributor_code;
            $data->agency_code  = $request->filled('agency_code') ? $request->agency_code  : $data->agency_code;
            $data->employee_code  = $request->filled('employee_code') ? $request->employee_code  : $data->employee_code;
            $data->bank  = $request->filled('bank') ? $request->bank  : $data->bank;
            $data->account_number  = $request->filled('account_number') ? $request->account_number  : $data->account_number;
            $data->account_name  = $request->filled('account_name') ? $request->account_name  : $data->account_name;
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

    public function deleteDisMember($id)
    {
        $data = DistributorMember::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }


    public function searchDisMember(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'string|max:30',
            'name' => 'string|max:30',
            'status' => 'in:active,inactive', 
            'email' => 'string|max:30', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $query = DistributorMember::query();
        //search
        if ($request->has('username')) {
            $query->where('username', 'like', '%' . $request->input('username') . '%');
        }

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
        //filter 
        if ($request->has('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->has('email')) {
            $query->where('email', $request->input('email'));
        }

        // $limit = $request->input('limit', 10);
        $limit = 10;
        $products = $query->paginate($limit);

        // dd($query->toSql(), $query->getBindings());
        return response()->json([
            'message' => 'successfully',
            'data' => $products
        ]);
    }
}

