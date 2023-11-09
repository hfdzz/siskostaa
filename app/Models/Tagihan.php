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

    public static $kode_status_tagihan = [
        'menunggu_pembayaran' => '0',
        'menunggu_validasi' => '1',
        'lunas' => '2',
    ];
    
    public static $text_status_tagihan = [
        '0' => 'Menunggu Pembayaran',
        '1' => 'Menunggu Validasi',
        '2' => 'Lunas',
    ];

    protected $fillable = [
        'status',
        'keterangan',
        'bukti_pembayaran',
        'pemesanan_id',
    ];

    // tanggal keluar from pemesanan->tanggal_masuk + 1 year
    public function getTanggalKeluarAttribute()
    {
        $tanggal_masuk = $this->pemesanan->tanggal_masuk;
        $tanggal_keluar = date('Y-m-d', strtotime('+1 year', strtotime($tanggal_masuk)));
        return $tanggal_keluar;
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function getStatusTagihanTextAttribute()
    {
        return self::$text_status_tagihan[$this->status];
    }
    
}
