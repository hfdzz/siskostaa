<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tagihan';

    public static $kode_status = [
        'menunggu_pembayaran' => '0',
        'menunggu_validasi' => '1',
        'ditolak' => '2',
        'selesai' => '3',
        'kadaluarsa' => '4'
    ];
    
    public static $text_status = [
        '0' => 'Menunggu Pembayaran',
        '1' => 'Menunggu Validasi',
        '2' => 'Ditolak',
        '3' => 'Selesai',
        '4' => 'Kadaluarsa'
    ];

    protected $fillable = [
        'status',
        'keterangan',
        'bukti_pembayaran',
        'pemesanan_id',
    ];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function getStatusTagihanTextAttribute()
    {
        return self::$text_status[$this->status];
    }
    
}
