<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factore extends Model
{
    use HasFactory;
    protected $fillable=[
        'Price_of_invoices'
    ];

    public function orders():HasMany{
        return $this->hasMany(Order::class);
    }


    public function products():HasMany{
        return $this->hasMany(Product::class);
    }

}
