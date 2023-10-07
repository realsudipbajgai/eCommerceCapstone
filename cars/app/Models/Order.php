<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function User(){
        return $this->hasOne(User::class,'customer_id');
    }
    public function cars()
    {
        return $this->belongsToMany(Car::class,'cars_orders','order_id','car_id');
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    protected $fillable = [
        'is_deleted',
    ];

}
