<?php

namespace App\Services\Products;

use App\Services\BaseServices;
use Illuminate\Support\Facades\DB;

class ProductService extends BaseServices 
{

    public function __construct() {

    }


    public function index() {

    }

    public function create() {
        DB::beginTransaction();
        try {

            // xử lý logic
            
            DB::commit();  
            //nếu success commit vào database
            return true;
        } catch (\Throwable $th) {
            // falied and rollback in database
            
            DB::rollBack();
            return false;
        }
    }
    
}
