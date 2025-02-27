<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    
    use HasFactory;
    
    protected $table = 'jurusan';
    protected $primaryKey = 'kode_jurusan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['kode_jurusan', 'nama_jurusan'];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kode_jurusan', 'kode_jurusan');
    }
}
