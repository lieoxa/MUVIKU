<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AccUser extends Model
{
    use HasFactory;

    protected $table = "users";

    protected $guarded = ["id"];

    public function getStatusAttribute()
    {
        // Hitung perbedaan waktu antara sekarang dan tanggal pembuatan akun
        $diffInDays = Carbon::parse($this->created_at)->diffInDays();

        // Jika perbedaan waktu kurang dari 1 hari, berarti masih "member baru"
        if ($diffInDays < 1) {
            return 'member baru';
        } else {
            return 'member lama';
        }
    }
}
