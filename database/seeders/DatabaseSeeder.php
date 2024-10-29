<?php

namespace Database\Seeders;

use App\Models\Driver;
use App\Models\Kendaraan;
use App\Models\Role;
use App\Models\StatusPesanan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'Admin',
        ]);

        Role::factory()->create([
            'name' => 'Atasan',
        ]);

        User::factory()->create([
            'name' => 'Baki',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Rusdi',
            'email' => 'atasan@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 2,
        ]);

        User::factory()->create([
            'name' => 'Dwi',
            'email' => 'atasan2@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 2,
        ]);

        Kendaraan::factory()->create([
            'jenis_kepemilikan' => 'Milik Perusahaan',
            'jenis_kendaraan' => 'Angkutan Orang',
            'nama_kendaraan' => 'Toyota Avanza',
            'nopol' => 'ABC123',
        ]);

        Kendaraan::factory()->create([
            'jenis_kepemilikan' => 'Milik Perusahaan',
            'jenis_kendaraan' => 'Angkutan Barang',
            'nama_kendaraan' => 'HiAce',
            'nopol' => 'DEF456',
        ]);

        Kendaraan::factory()->create([
            'jenis_kepemilikan' => 'Sewa',
            'jenis_kendaraan' => 'Angkutan Barang',
            'nama_kendaraan' => 'Truk 1',
            'nopol' => 'DEF456',
        ]);

        Kendaraan::factory()->create([
            'jenis_kepemilikan' => 'Sewa',
            'jenis_kendaraan' => 'Angkutan Orang',
            'nama_kendaraan' => 'Truk 2',
            'nopol' => 'DEF456',
        ]);

        Driver::factory()->create([
            'name' => 'Andri',
            'phone_number' => '08123456789',
            'license_number' => 'A123456',
            'license_expiration_date' => '2023-12-31',
            'address' => 'Jln. Kemiri No. 123'
        ]);

        Driver::factory()->create([
            'name' => 'Agung',
            'phone_number' => '08123456229',
            'license_number' => 'A231223',
            'license_expiration_date' => '2024-12-31',
            'address' => 'Jln. Kemiri No. 42'
        ]);

        StatusPesanan::factory()->create([
            'nama_status' => 'Menunggu Persetujuan'
        ]);

        StatusPesanan::factory()->create([
            'nama_status' => 'Disetujui Atasan'
        ]);

        StatusPesanan::factory()->create([
            'nama_status' => 'Ditolak Atasan'
        ]);
    }
}
