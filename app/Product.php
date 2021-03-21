<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table='products';
    protected $fillable=[
        'id','product_name','product_price','product_discount','product_description',
        'product_voltage','product_color','product_image','category_id','status'
    ];
}
