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
            $table->foreignId("pengajuan_id")->constrained("pengajuan","id");
            // $table->foreignId("dok_no")->constrained("pengajuan","dok_no");
            $table->string('dok_no');
            $table->string('dok_tipe');
            $table->string('dok_dasar')->nullable();
            $table->string('mitra_nama');
            $table->string('jurusan');
            $table->integer('tingkat');
            $table->string('ks_judul');
            $table->string('ks_detail');
            $table->dateTime('dt_start');
            $table->dateTime('dt_end');
            $table->string('ks_bukti')->nullable();
            $table->string('ks_dokumen')->nullable();
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
