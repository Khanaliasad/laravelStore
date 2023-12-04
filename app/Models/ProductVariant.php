<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $fillable = [ 'product_id','color','size','stock_quantity'];

    use HasFactory;

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItems::class);
    }

}
