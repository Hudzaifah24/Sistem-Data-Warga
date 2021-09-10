<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargaDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluarga_detail', function (Blueprint $table) {
            $table->id();
            $table->enum('status_dalam_keluarga', ['AYAH', 'IBU', 'ANAK']);
            $table->foreignId('kartukeluarga_id');
            $table->foreignId('penduduk_id');

            $table->softDeletes();
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
        Schema::dropIfExists('kartu_keluarga_detail');
    }
}
