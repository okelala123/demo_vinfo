<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProviderRequest;
use App\Models\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProvidersController extends Controller
{
    public function getAllProviders()
    {
        $products = Providers::all();
        // dd($products);
        return response()->json($products);
    }



    public function createProviders(ProviderRequest $request)
    {
        $validatedData = $request->validated();
        
        $data = new Providers();
        $data->logo = $request->logo;
        $data->catalog_id = $request->catalog_id;
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->address = $request->address;
        $data->company_information = $request->company_information;
        $data->business_licence_number = $request->business_licence_number;

        $data->save();

        return response()->json(['message' => 'successfully']);
    }


    public function updateProviders(ProviderRequest $request, $id)
    {
        $validatedData = $request->validated();


        $data = Providers::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->logo = $request->filled('logo') ? $request->logo : $data->logo;
            $data->catalog_id = $request->filled('catalog_id') ? $request->catalog_id : $data->catalog_id;
            $data->name = $request->filled('name') ? $request->name : $data->name;
            $data->desc = $request->filled('desc') ? $request->desc : $data->desc;
            $data->address = $request->filled('address') ? $request->address : $data->address;
            $data->company_information = $request->filled('company_information') ? $request->company_information : $data->company_information;
            $data->business_licence_number = $request->filled('business_licence_number') ? $request->business_licence_number : $data->business_licence_number;


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


    public function deleteProviders($id)
    {
        $data = Providers::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }


    public function searchProviders(ProviderRequest $request)
    {
        $validatedData = $request->validated();

        $query = Providers::query();
        //search
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

   
        //filter 
        if ($request->has('catalog')) {
            $query->where('catalog_id', $request->input('catalog'));
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
