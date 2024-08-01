<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Providers;
class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';

    // public function providers()
    // {
    //     return $this->belongsTo(Providers::class, 'providers_id');
    // }
}
