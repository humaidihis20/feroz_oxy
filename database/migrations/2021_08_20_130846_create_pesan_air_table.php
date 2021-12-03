<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanAirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan_air', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('users_id');
            $table->string('kode_pelanggan');
            $table->string('name');
            $table->string('email');
            $table->string('no_hp');
            $table->string('tanggal');
            $table->string('jumlah_pesanair');
            $table->string('alamat');
            $table->integer('harga_galon');
            $table->integer('biaya_pengantar_galon');
            $table->integer('total');
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
        Schema::dropIfExists('pesan_air');
    }
}
