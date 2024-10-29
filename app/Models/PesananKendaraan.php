<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananKendaraan extends Model
{
    protected $table = 'pesanan_kendaraan';

    protected $fillable = [
        'id_kendaraan',
        'id_driver',
        'tanggal_pemesanan',
        'pihak_penyetuju',
        'id_pengaju',
        'status',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'id_driver', 'id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id');
    }

    public function statusPesanan()
    {
        return $this->belongsTo(StatusPesanan::class, 'status', 'id');
    }

    public function penyetuju()
    {
        return $this->belongsTo(User::class, 'pihak_penyetuju', 'id');
    }

    public function pengaju()
    {
        return $this->belongsTo(User::class, 'id_pengaju', 'id');
    }
}
