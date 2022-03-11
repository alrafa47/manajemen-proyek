<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek', 50);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('spk', 255);
            $table->string('bast', 255);
            $table->string('kontrak_kerja', 255);
            $table->string('nama_klien', 50);
            $table->string('tlp_klien', 20);
            $table->string('alamat_klien', 50);
            $table->string('lap_pendahuluan', 255);
            $table->string('lap_akhir', 255);
            $table->foreignId('pegawai_id')->references('id')->on('pegawais');
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
        Schema::dropIfExists('proyeks');
    }
}
