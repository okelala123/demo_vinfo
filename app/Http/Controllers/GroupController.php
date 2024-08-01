<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\DistributorOrganization;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    //
    public function createGroup(GroupRequest $request)
    {
        $validatedData = $request->validated();

        
        $data = new Group();
        $data->group_name =$request->group_name;
        $data->group_code =$request->group_code;
        $data->distributors_id = $request->distributors_id;
        $data->current_distributor_id = $request->current_distributor_id;
        $data->default_distributor_id = $request->default_distributor_id;

        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateGroup(GroupRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = Group::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->group_name  = $request->filled('group_name') ? $request->group_name  : $data->group_name;
            $data->group_code  = $request->filled('group_code') ? $request->group_code  : $data->group_code;
            $data->distributors_id  = $request->filled('distributors_id') ? $request->distributors_id  : $data->distributors_id;
            $data->current_distributor_id  = $request->filled('current_distributor_id') ? $request->current_distributor_id  : $data->current_distributor_id;
            $data->default_distributor_id  = $request->filled('default_distributor_id') ? $request->default_distributor_id  : $data->default_distributor_id;
         
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

    public function deleteGroup($id)
    {
        $data = Group::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    


    public function searchGroup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_code' => 'nullable|string|max:30',
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $query = Group::query();
        //search
        if ($request->has('group_code')) {
            $query->where('group_code', 'like', '%' . $request->input('group_code') . '%');
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
