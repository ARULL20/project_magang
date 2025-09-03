<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PengajuanZoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemohon',
        'instansi',
        'jadwal',
        'status',
    ];

    protected static function booted(): void
    {
        // Saat create oleh pegawai -> status otomatis pending
        static::creating(function ($zoom) {
            if (Auth::check() && Auth::user()->role === 'pegawai') {
                $zoom->status = 'pending';
            }
        });

        // Saat update oleh pegawai -> status tidak bisa diubah
        static::updating(function ($zoom) {
            if (Auth::check() && Auth::user()->role === 'pegawai') {
                $zoom->status = $zoom->getOriginal('status');
            }
        });
    }
}
