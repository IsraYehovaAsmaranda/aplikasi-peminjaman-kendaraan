<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';

    protected $fillable = [
        'jenis_kepemilikan',
        'jenis_kendaraan',
        'nama_kendaraan',
        'nopol'
    ];

    public function pesananKendaraan()
    {
        return $this->hasMany(PesananKendaraan::class);
    }
}
