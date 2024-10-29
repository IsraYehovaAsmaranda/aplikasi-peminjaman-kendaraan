<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'driver';

    protected $fillable = [
        'name',
        'phone_number',
        'license_number',
        'license_expiration_date',
        'address',
    ];

    public function pesananKendaraan() {
        return $this->hasMany(PesananKendaraan::class);
    }
}
