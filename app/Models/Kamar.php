<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'nomor_kamar',
        'kode_gedung',
        'jenis_kamar',
        'pemesanan_id',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function getKodeKamar()
    {
        return $this->nomor_kamar . $this->kode_gedung;
    }
}
