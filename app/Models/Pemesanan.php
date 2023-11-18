<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    public static $kode_status = [
        'menunggu_validasi' => '0',
        'menunggu_pembayaran' => '1',
        'ditolak' => '2',
        'selesai' => '3',
    ];

    public static $text_status = [
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
        'status',
        'nomor_kamar',
        'keterangan',
        'total_tagihan',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class);
    }

    public function getKamar()
    {
        // split nomor_kamar to [nomo_kamar, kode_gedung] by splitting at last character
        $nomor_kamar = substr($this->nomor_kamar, 0, -1);
        $kode_gedung = substr($this->nomor_kamar, -1);
        return Kamar::where('nomor_kamar', $nomor_kamar)->where('kode_gedung', $kode_gedung)->first();
    }
    
    // status pemesanan text
    public function getStatusPemesananText()
    {
        return self::$text_status[$this->status];
    }

    // jenis pembayaran text
    public function getJenisPembayaranText()
    {
        return $this->jenis_pembayaran == 'penuh' ? 'Penuh' : 'DP';
    }

    // jenis kelamin text
    public function getJenisKelaminText()
    {
        return $this->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan';
    }

}
