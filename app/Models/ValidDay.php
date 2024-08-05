<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidDay extends Model
{
    use HasFactory,SoftDeletes;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($voucher) {
            $voucher->id = Str::random(10);
        });
    }
    protected $guarded = [];
}
