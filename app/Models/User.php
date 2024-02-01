<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

     protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // public function RequestAprove(){
    //     return $this->hasOne(RequestAprove::class,'user_id');
    // }

    // User.php


    public function requests()
    {
        return $this->hasMany(RequestAprove::class, 'user_id');
    }

    public function isVendor()
    {
        return $this->role === 1;
    }


}
