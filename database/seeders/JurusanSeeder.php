<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurusan')->insert([
            ['kode_jurusan' => 'T01', 'nama_jurusan' => 'Teknik Informatika'],
            ['kode_jurusan' => 'T02', 'nama_jurusan' => 'Sistem Informasi'],
            ['kode_jurusan' => 'T03', 'nama_jurusan' => 'Desain Komunikasi Visual'],
            ['kode_jurusan' => 'F01', 'nama_jurusan' => 'Akuntansi'],
        ]);
    }
}
