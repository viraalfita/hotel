<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    use HasFactory;
    protected $fillable = ['tgl_checkin','tgl_checkout', 'jumlah_kamar', 'nama_pemesan', 'email', 'no_hp',
                            'nama_tamu', 'id_kamar', 'is_checkin'];
    protected $table = 'reservasi';
}
