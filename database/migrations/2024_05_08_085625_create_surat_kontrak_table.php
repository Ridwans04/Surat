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
        Schema::create('surat_kontrak', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tanggal_hijriyah')->nullable();
            $table->string('nama')->nullable();
            $table->string('ttl')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('status_kerja')->nullable();
            $table->string('awal_kerja')->nullable();
            $table->string('akhir_kerja')->nullable();
            $table->string('masa_kerja')->nullable();
            $table->string('masa_kontrak')->nullable();
            $table->string('jam_kerja')->nullable();
            $table->string('honor')->nullable();
            $table->string('terbilang')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('potongan_honor')->nullable();
            $table->enum('status', ['Baru', 'Sedang Diproses', 'Terbit'])->nullable();
            $table->string('persetujuan')->nullable();
            $table->foreignId('klasifikasi_id')->nullable();
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
        Schema::dropIfExists('surat_kontrak');
    }
};
