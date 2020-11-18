<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    protected $table='UserTable';
    protected $fillable=['UserName','Email','Password'];
}
