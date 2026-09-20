<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function product_category(){
        return $this->belongsTo(ProductCategory::class );
    }
     public function product_variations(){
        return $this->hasMany(ProductVariation::class )->orderBy('sort_order','asc');
    }
}
