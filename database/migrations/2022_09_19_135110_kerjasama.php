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
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->id();
            $table->foreignId("mitra_id")->constrained("mitra","id");
            $table->foreignId("tingkat_id")->constrained("tingkat","id");
            $table->foreignId("type_id")->constrained("type","id");
            $table->string('dokumen_no');
            $table->string('dokumen_dasar');
            $table->string('judul_kerjasama');
            $table->string('bentuk_kegiatan');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_berakhir');
            $table->string('bukti');
            $table->string('dokumen');
            $table->integer('status');
            $table->foreignId("user_id")->constrained("users","id");
            $table->dateTime('tanggal_input');
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
        Schema::dropIfExists('kerjasama');
    }
};
