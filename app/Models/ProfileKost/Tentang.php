<?php

namespace App\Models\ProfileKost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    protected $table = 'profile_kost_tentang';

    protected $fillable = [
        'foto_tentang',
        'deskripsi_tentang',
    ];
}
