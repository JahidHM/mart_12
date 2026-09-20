<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariation extends Model
{
    public function products(){
        return $this->belongsTo(Product::class);
    }
}
