<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::insert([
            [
                'kode_prodi' => 'TI',
                'nama_prodi' => 'Teknik Informatika',
                'fakultas'   => 'Teknologi Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_prodi' => 'SI',
                'nama_prodi' => 'Sistem Informasi',
                'fakultas'   => 'Teknologi Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_prodi' => 'TE',
                'nama_prodi' => 'Teknik Elektro',
                'fakultas'   => 'Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_prodi' => 'TS',
                'nama_prodi' => 'Teknik Sipil',
                'fakultas'   => 'Teknik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}