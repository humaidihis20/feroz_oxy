<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PesanAir extends Model
{
    use HasFactory;

    protected $table = 'pesan_air';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_id',
        'kode_pelanggan',
        'name',
        'email',
        'no_hp',
        'jumlah_pesanair',
        'alamat', 'tanggal',
        'harga_galon',
        'biaya_pengantar_galon',
        'total',
        'status'
       ];

    // public $timestamps = false;
    // public $incrementing = false;

    public static function id_pelanggan()
    {
    	$kode = DB::table('pesan_air')->max('kode_pelanggan');
    	$addNol = '';
    	$kode = str_replace("PSA-", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	}

    	$kodeBaru = "PSA-".$addNol.$incrementKode;
    	return $kodeBaru;

    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function konfirmasipembayaran()
    {
        return $this->hasMany(KonfirmasiPembayaran::class);
    }

}
