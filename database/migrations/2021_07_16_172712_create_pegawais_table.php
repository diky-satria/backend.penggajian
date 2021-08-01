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
            $table->string('nip')->unique();
            $table->string('nama_pegawai');
            $table->foreignId('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans');
            $table->foreignId('golongan_id');
            $table->foreign('golongan_id')->references('id')->on('golongans');
            $table->foreignId('jenis_kelamin_id');
            $table->foreign('jenis_kelamin_id')->references('id')->on('jenis_kelamins');
            $table->string('telepon');
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
