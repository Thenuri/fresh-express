<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'category',
        'image',
    ];

    // public function orders()
    // {
    //     return $this->belongsToMany(Order::class);
    // }

    // public function carts()
    // {
    //     return $this->belongsToMany(Cart::class);
    // }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    



}



