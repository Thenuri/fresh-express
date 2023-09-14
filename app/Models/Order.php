<?php

namespace App\Models;
use App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'cart_id',
        'total',
        'status',
        'delivery_address',
        'ZIP_code',
        'city',
        'delivery_type',
        'order_number',

    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class ,'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    // public function products()
    // {
    //     return $this->belongsToMany(products::class ,'product_id');
    // }

    public function products()
    {
        return $this->hasManyThrough(products::class, CartItem::class, 'cart_id', 'id', 'cart_id', 'product_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class ,'cart_id','cart_id');
    }
    
}
