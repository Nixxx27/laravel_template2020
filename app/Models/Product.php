<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'product';
    protected $guarded = [];

    public function categories()
    {
        // return $this->hasMany('App\Models\CategoryPerProduct','product_id');
        return $this->hasOne('App\Models\CategoryPerProduct','product_id');
    }
}
