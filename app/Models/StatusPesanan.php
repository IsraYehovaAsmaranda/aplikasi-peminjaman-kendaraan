<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    use HasFactory;
    protected $table = 'status_pesanan';

    protected $fillable = ['nama_status'];

    public function pesanan()
    {
        return $this->hasMany(PesananKendaraan::class);
    }
}
