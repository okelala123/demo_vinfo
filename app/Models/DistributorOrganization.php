<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributorOrganization extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'distributors_organizations';

    public function getAllData()
    {
        $data = DistributorOrganization::all();

        return $data;
    }
}
