<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPaymentDetail extends Model
{
    protected $fillable = [
        'order_id', 'payment_method'
    ];
}
