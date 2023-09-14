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
}



