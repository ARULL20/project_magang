<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanZoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemohon',
        'instansi',
        'jadwal',
        'status',
    ];
}
