<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKtpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ktp', function (Blueprint $table) {
            $table->id();
            $table->text('photo');
            $table->foreignId('warga_id');
            // $table->string('provinsi');
            // $table->string('kota');
            // $table->string('NIK');
            // $table->string('nama');
            // $table->string('tempat_lahir');
            // $table->date('tanggal_lahir');
            // $table->enum('jenis_kelamin', ['LAKI-LAKI', 'WANITA']);
            // $table->string('Gol_darah', 5)->nullable();
            // $table->text('alamat');
            // $table->string('RT', 15);
            // $table->string('RW', 15);
            // $table->string('desa');
            // $table->string('kecamatan');
            // $table->string('agama');
            // $table->enum('status_perkawinan', ['KAWIN', 'BELOM_KAWIN', 'BERCERAI']);
            // $table->string('pekerjaan');
            // $table->string('kewarganegaraan');
            // $table->string('expired');
            // $table->date('dibuat');
            // $table->text('TTD');
            // $table->foreignId('warga_id')->nullable();

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
        Schema::dropIfExists('ktp');
    }
}
