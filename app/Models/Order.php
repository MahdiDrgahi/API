<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'price',
        'Description',
        'user_id'
    ];

    public function users():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function factores():HasMany{
        return $this->hasMany(Factore::class);
    }

    public function products():HasMany{
        return $this->hasMany(Product::class);

    }


    public function product(){
        return $this->belongsToMany(Product::class);
    }

}
