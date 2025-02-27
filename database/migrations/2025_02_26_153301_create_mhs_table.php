<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mhs', function (Blueprint $table) {
            $table->string('nim')->primary();
            $table->string('nama_lengkap');
            $table->string('kode_jurusan');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('id_provinsi');
            $table->text('id_kota');
            $table->text('id_kecamatan');
            $table->text('id_kelurahan');
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('kode_jurusan')->references('kode_jurusan')->on('jurusan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs');
    }
};
