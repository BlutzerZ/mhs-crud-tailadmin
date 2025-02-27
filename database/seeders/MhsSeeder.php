<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mhs')->insert([
            [
                'nim' => 'A1919',
                'nama_lengkap' => 'Andien',
                'kode_jurusan' => 'T01',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2005-04-10',
                'id_provinsi' => '33', 
                'id_kota' => '3374', 
                'id_kecamatan' => '3374030',
                'id_kelurahan' => '3374030005',
                'alamat' => 'Jl. Stonen Timur 7A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 'A1920',
                'nama_lengkap' => 'Ahmad',
                'kode_jurusan' => 'T01',
                'tempat_lahir' => 'Kendal',
                'tanggal_lahir' => '1999-12-07',
                'id_provinsi' => '33', 
                'id_kota' => '3326', 
                'id_kecamatan' => '3326010', 
                'id_kelurahan' => '3326010009', 
                'alamat' => 'Jalan Bayam, Rt 1, Rw 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 'A1921',
                'nama_lengkap' => 'Bambang',
                'kode_jurusan' => 'T01',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2003-08-08',
                'id_provinsi' => '33', 
                'id_kota' => '3374', 
                'id_kecamatan' => '3374020', 
                'id_kelurahan' => '3374020008', 
                'alamat' => 'Jl. Sisingamaraja no. 9',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => 'B1901',
                'nama_lengkap' => 'Zain',
                'kode_jurusan' => 'F01',
                'tempat_lahir' => 'Jepara',
                'tanggal_lahir' => '2000-07-20',
                'id_provinsi' => '33', 
                'id_kota' => '3322', 
                'id_kecamatan' => '3322010', 
                'id_kelurahan' => '3322010007', 
                'alamat' => 'Desa Keiling',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
