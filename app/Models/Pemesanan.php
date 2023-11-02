<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pemesanan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'perguruan_tinggi',
        'nik',
        'jenis_kelamin',
        'tanggal_masuk',
        'jenis_kamar',
        'jenis_pembayaran',
        'status_pemesanan',
        'nomor_kamar',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
