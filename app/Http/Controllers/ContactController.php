<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{
    public function createContact(ContactRequest $request)
    {
        $validatedData = $request->validated();

        
        $data = new Contact();
        $data->email_customer_services = $request->email_customer_services;
        $data->email_accountant = $request->email_accountant;
        $data->phone_1 = $request->phone_1;
        $data->phone_2 = $request->phone_2;
        $data->providers_id = $request->providers_id;
 

        $data->save();

        return response()->json(['message' => 'successfully']);
    }

    public function updateContact(ContactRequest $request, $id)
    {

        $validatedData = $request->validated();

        $data = Contact::find($id);

        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        } else {
            $data->email_customer_services = $request->filled('email_customer_services') ? $request->email_customer_services : $data->email_customer_services;
            $data->email_accountant = $request->filled('catalog_id') ? $request->email_accountant : $data->email_accountant;
            $data->phone_1 = $request->filled('phone_1') ? $request->phone_1 : $data->phone_1;
            $data->phone_2 = $request->filled('phone_2') ? $request->phone_2 : $data->phone_2;
            $data->providers_id  = $request->filled('providers_id ') ? $request->providers_id  : $data->providers_id ;
        

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


    public function deleteContact($id)
    {
        $data = Contact::find($id);
        if (!$data) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }



    public function searchContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'string|max:30',
            'providers_id' => 'integer',
          
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }
        $query = Contact::query();
        // $query = Contact::with('providers'); 

        //search
        if ($request->has('email')) {
            $query->where('email_customer_services', 'like', '%' . $request->input('email') . '%');
        }

   
        //filter 
        if ($request->has('providers_id')) {
            $query->where('providers_id', $request->input('providers_id'));
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
