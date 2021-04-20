<?php

namespace App;

use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard='admin';

    protected $table='AdminTable';
    protected $fillable=[
        'name','email','password'
    ];

    protected $hidden=[
        'password','remember_token'
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
}

