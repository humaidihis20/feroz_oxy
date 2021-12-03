<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTestimonials extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'testimoni';

    protected $fillable = [
         'testimonial', 'users_id'
       ];

    public function getId()
    {
      $this->belongsTo(User::class);
    }
}
