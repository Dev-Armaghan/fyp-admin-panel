<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
    public $timestamps=false;
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    protected $fillable=[
        'user_address',
        'user_tel',
        'email',
        'password',
    ];

}
