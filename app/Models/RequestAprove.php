<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAprove extends Model
{
    use HasFactory;
    protected $table = 'request_aproves';
    protected $fillable = ['user_id' , 'status'];

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
