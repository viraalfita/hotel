<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas_hotel extends Model
{
    use HasFactory;
    protected $fillable = ['nama_fasilitas',  'keterangan', 'gambar'];
    protected $table = 'fasilitas_hotel';
}
