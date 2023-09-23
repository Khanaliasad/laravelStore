<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

}
