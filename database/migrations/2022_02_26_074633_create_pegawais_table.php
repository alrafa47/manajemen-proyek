<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai', 50);
            $table->string('jenis_kelamin', 20);
            $table->string('alamat_pegawai', 50);
            $table->string('tlp_pegawai', 20);
            $table->string('kualifikasi', 100);
            $table->foreignId('jabatan_id')->references('id')->on('jabatans');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
