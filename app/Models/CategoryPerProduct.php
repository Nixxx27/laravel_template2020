<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryPerProduct extends Model
{
    use SoftDeletes;

    protected $table = 'category_per_product';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
      
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory','productcategory_id');
      
    }
}
