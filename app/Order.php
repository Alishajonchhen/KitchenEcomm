<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_no', 'user_id', 'status', 'canceled_by', 'canceled_date', 'total', 'grand_total', 'canceled_note', 'completed_by'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(OrderPaymentDetail::class, 'order_id', 'id');
    }

    public function orderDeliveryAddress()
    {
        return $this->hasOne(OrderDeliveryDetail::class, 'order_id', 'id');
    }
}
