<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('dok_no');
            $table->string('dok_tipe');
            $table->string('mitra_nama');
            $table->string('mitra_deskripsi');
            $table->string('mitra_alamat');
            $table->string('ks_judul');
            $table->String('tingkat');
            $table->string('ks_detail');
            $table->string('pdt');
            $table->string('pdt_jb');
            $table->string('pdt_mitra');
            $table->string('pdt_mitrajb');
            $table->string('pdt_lokasi');
            $table->dateTime('dt_start');
            $table->dateTime('dt_end');
            $table->integer('status');
            $table->rememberToken();
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
        Schema::dropIfExists('pengajuans');
    }
};
