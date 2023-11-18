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

    public function getFotoFasilitasAttribute()
    {
        if ($this->attributes['foto_fasilitas'] == 'fake') {
            return asset('default_img/placeholder_fasilitas.jpg');
        }
        return asset('storage/' . $this->attributes['foto_fasilitas']);
    }
}
