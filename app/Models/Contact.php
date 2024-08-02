<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Providers;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'contacts';

    // public function providers()
    // {
    //     return $this->belongsTo(Providers::class, 'providers_id');
    // }
}
