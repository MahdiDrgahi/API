<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_name',
        'Description',
        'Category',
        'Price',
        'inventory'
    ];

    public function orders():HasMany{
        return $this->hasMany(Order::class);
    }


    public function factores():HasMany{
        return $this->hasMany(Factore::class);
    }


    public function order(){
        return $this->belongsToMany(Order::class);
    }

}
