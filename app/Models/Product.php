<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'updated_at', 'created_at'];
    use HasFactory;

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

}
