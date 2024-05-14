<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AccAdmin extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $table = "acc_admins";

    protected $guarded = ["id"], $guard = 'acc_admin'; 

    protected $casts = [
        'password' => 'hashed',
    ];

    protected $hidden = [
        'password'
    ];
}
