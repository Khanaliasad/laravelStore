<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        "user_id",
        "order_date",
        "customer_name",
        "customer_last_name",
        "customer_email",
        "customer_phone",
        "customer_address",
        "status",
        "order_description",
        "subtotal",
        "discount",
        "total_amount"
    ];

    use HasFactory;
    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
