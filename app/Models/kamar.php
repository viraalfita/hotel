<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    use HasFactory;
    protected $fillable = ['tipe_kamar', 'jumlah_kamar', 'gambar'];
    protected $table = 'kamar';
}
