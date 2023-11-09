<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas_kamar extends Model
{
    use HasFactory;
    protected $fillable = ['id_kamar', 'nama_fasilitas'];
    protected $table = 'fasilitas_kamar';
}
