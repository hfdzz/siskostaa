<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    public static $kode_status_pemesanan = [
        'menunggu_validasi' => '0',
        'menunggu_pembayaran' => '1',
        'ditolak' => '2',
        'selesai' => '3',
    ];

    public static $text_status_pemesanan = [
        '0' => 'Menunggu Validasi',
        '1' => 'Menunggu Pembayaran',
        '2' => 'Ditolak',
        '3' => 'Selesai',
    ];

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
    
    // status pemesanan text
    public function getStatusPemesananText()
    {
        return self::$text_status_pemesanan[$this->status_pemesanan];
    }

    // jenis pembayaran text
    public function getJenisPembayaranText()
    {
        return $this->jenis_pembayaran == 'penuh' ? 'Pembayaran Penuh' : 'Pembayaran DP';
    }

}
