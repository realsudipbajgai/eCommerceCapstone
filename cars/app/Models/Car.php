<?php

// app/Models/Car.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'category_id',
        'brand_id',
        'make',
        'model',
        'year',
        'price',
        'mileage',
        'color',
        'fuel_type',
        'description',
        'image',
        'is_deleted',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'cars_orders','car_id','order_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}