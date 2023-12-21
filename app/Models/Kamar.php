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
        'status_available',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function getKodeKamar()
    {
        return $this->nomor_kamar . $this->kode_gedung;
    }

    public function addOcupant($pemesanan_id)
    {
        $this->update([
            'pemesanan_id' => $pemesanan_id,
            'status_available' => 0,
        ]);
    }

    public function removeOcupant()
    {
        $this->update([
            'pemesanan_id' => null,
            'status_available' => 1,
        ]);
    }
}
