<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matkul extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('matkul', function(Blueprint $tabel){
            $tabel->string('id', 5)->primary();
            $tabel->string('nama_matkul', 50);
            $tabel->string('sks',10);
            $tabel->string('prodi',20);

        });
        Schema::create('mahasiswa', function(Blueprint $tabel){
            $tabel->string('nim', 20)->primary();
            $tabel->string('nama_mahasiswa', 50);
            $tabel->enum('jenis_kelamin', ['L','P']);
            $tabel->string('mata_kuliah', 50);
            $tabel->string('alamat', 50);


        });
        Schema::create('dosen', function(Blueprint $tabel){
            $tabel->string('nip', 20)->primary();
            $tabel->string('nama_dosen', 50);
            $tabel->string('jenis_kelamin', 50);
            $tabel->string('alamat', 50);


        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('matkul');
        Schema::dropIfExists('mahasiswa');
        Schema::dropIfExists('dosen');
    }
}
