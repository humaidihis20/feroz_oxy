<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'metode_pembayaran', 'users_id', 'pesan_air_id' 
        // 'status_pembayaran'
       ];

    public function pesan_air(){
        return $this->belongsTo(PesanAir::class);
    }

    public static function pesanan_id()
    {
        return PesanAir::where('active', 1)->get();
    }
}
