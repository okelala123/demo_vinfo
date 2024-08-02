<?php

namespace App\Repositories\Products;

use App\Models\Product;
use App\Repositories\BaseRepositories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductRepositories extends BaseRepositories 
{

    public function __construct(Product $model) {
         $this->model = $model;
    }
    
    
}
