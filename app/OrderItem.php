<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'total', 'discount', 'price', 'status', 'remarks', 'canceled_by', 'canceled_date'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
