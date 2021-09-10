<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('NIK')->nullable();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['LAKILAKI', 'PEREMPUAN', 'UPNORMAL']);
            $table->foreignId('dusun_id')->nullable();
            $table->string('dusun');
            $table->integer('RT')->nullable();
            $table->integer('RW')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->enum('agama', ['ISLAM', 'KRISTEN', 'BUDA', 'HINDU', 'ATEIS']);
            $table->enum('status', ['MENIKAH', 'BELUM_MENIKAH', 'BERCERAI'])->nullable();
            $table->boolean('kepala_keluarga')->default(false);
            $table->boolean('kematian')->nullable()->default(false);
            $table->boolean('kelahiran')->nullable()->default(false);
            $table->string('pekerjaan')->nullable();
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);

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
        Schema::dropIfExists('penduduk');
    }
}
