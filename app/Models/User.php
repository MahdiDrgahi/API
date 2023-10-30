<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use mysql_xdevapi\Table;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasFactory , Authenticatable , HasApiTokens , Notifiable,HasRoles;

   protected $guard_name = 'sanctum';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'city',
        'country',
        'gender',
        'age',
        'email',
        'password',
        'education',
        'National_Code',
    ];

    protected $casts =[
        'emil_verified_at'=> 'datetime',
        'password'=> 'hashed'
    ];
   public function orders(): HasMany{
       return $this->hasMany(Order::class);
   }

   public function factores():HasMany{
       return $this->hasMany(Factore::class);
   }
}

