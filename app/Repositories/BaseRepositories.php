<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepositories 
{
    public $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    

    public function create(array $data = []) {
        $this->model->create($data);
        return $this->model->refresh();
    }
}
