<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelsAdmin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'artikels';

    protected $fillable = [
        'judul_artikel', 'upload_gambar', 'konten', 'slug'
    ];
}
