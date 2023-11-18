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

    public function getFotoTentangAttribute()
    {
        // if null return default image
        if (!$this->attributes['foto_tentang']) {
            return 'default_img/default_tentang.png';
        }
        return asset('storage/profile-kost/' . $this->attributes['foto_tentang']);
    }
}
