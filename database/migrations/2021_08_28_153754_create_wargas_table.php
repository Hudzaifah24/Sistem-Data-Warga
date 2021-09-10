<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_kk');
            $table->string('NIK');
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'WANITA']);
            $table->text('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['ISLAM', 'KRISTEN']);
            $table->string('gol_darah')->nullable();
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->enum('status_perkawinan', ['KAWIN', 'BELOM_KAWIN', 'BERCERAI']);
            $table->enum('status_hubungan_dalam_keluarga', ['ANAK', 'IBU', 'AYAH']);
            $table->text('alamat');
            $table->string('kewarganegaraan');
            $table->string('no_paspor')->nullable();
            $table->string('no_KITAS_KITAP')->nullable();
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('berlaku');
            $table->foreignId('desa_id')->nullable();
            $table->foreignId('rt_id')->nullable();
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('code_pos')->nullable();
            $table->text('TTD')->nullable();
            $table->text('photo')->nullable();

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
        Schema::dropIfExists('wargas');
    }
}
