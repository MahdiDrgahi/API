<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use mysql_xdevapi\Table;

class User extends Model
{
    use HasFactory , Authenticatable , HasApiTokens , Notifiable;

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
}
