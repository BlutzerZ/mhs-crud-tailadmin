<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Model
{
    
    use HasFactory;

    protected $table = 'mhs';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nim', 
        'nama_lengkap', 
        'kode_jurusan', 
        'tempat_lahir', 
        'tanggal_lahir', 
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'id_kelurahan',
        'alamat',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }
}
