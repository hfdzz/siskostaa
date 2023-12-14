<?php

namespace App\Models\ProfileKost;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'profile_kost_fasilitas';

    protected $fillable = [
        'deskripsi_fasilitas',
        'foto_fasilitas',
    ];

    public function getFotoFasilitasAttribute($value)
    {
        if ($value) {
            return asset('storage/' . $value);
        }
        return asset('Assets/default_img/placeholder_fasilitas.png');
    }
}
