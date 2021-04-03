<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDeliveryDetail extends Model
{
    protected $fillable = [
        'order_id', 'full_name', 'delivery_location', 'contact_number', 'email', 'address', 'message'
    ];
}
