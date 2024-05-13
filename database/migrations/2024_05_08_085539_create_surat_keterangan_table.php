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
        Schema::create('surat_keterangan', function (Blueprint $table) {
            $table->id();
            $table->string('institusi')->nullable();
            $table->string('permohon')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('ttl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nama_ortu')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('alamat_kerja')->nullable();
            $table->string('isi_surat')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tanggal_hijriyah')->nullable();
            $table->string('tanggal_permintaan')->nullable();
            $table->string('softfile')->nullable();
            $table->enum('status', ['Baru', 'Sedang Diproses', 'Terbit'])->nullable();
            $table->string('persetujuan')->nullable();
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
        Schema::dropIfExists('surat_keterangan');
    }
};
