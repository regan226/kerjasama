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
        Schema::create('unitassigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId("unit_id")->constrained("units","id")->nullable();
            // $table->foreignId("kerjasama_id")->constrained("kerjasamas","id")->nullable();
            $table->foreignId("pengajuan_id")->constrained("pengajuans","id")->nullable();
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
        Schema::dropIfExists('unitassigns');
    }
};
