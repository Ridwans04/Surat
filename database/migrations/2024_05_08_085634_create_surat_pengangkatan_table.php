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
        Schema::create('surat_pengangkatan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->string('tanggal_rapat')->nullable();
            $table->string('penilaian')->nullable();
            $table->string('divisi')->nullable();
            $table->string('nama')->nullable();
            $table->string('nip')->nullable();
            $table->string('ttl')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('lulusan')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tanggal_penetapan')->nullable();
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
        Schema::dropIfExists('surat_pengangkatan');
    }
};
