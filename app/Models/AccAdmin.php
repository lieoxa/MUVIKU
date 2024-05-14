<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccAdmin extends Model
{
    use HasFactory;
    protected $table = "acc_admins";

    protected $guarded = ["id"]; 
}
