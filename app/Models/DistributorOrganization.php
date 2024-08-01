<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributorOrganization extends Model
{
    use HasFactory;
    protected $table = 'distributors_organizations';

    public function getAllData()
    {
        $data = DistributorOrganization::all();

        return $data;
    }
}
