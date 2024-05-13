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
        Schema::create('surat_keluar_internal', function (Blueprint $table) {
            $table->id();
            $table->string('template')->nullable();
            $table->string('institusi')->nullable();
            $table->string('pemohon')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('tanggal_permintaan')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tanggal_hijriyah')->nullable();
            $table->string('kepada')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('perihal')->nullable();
            $table->string('hari')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->string('isi_surat')->nullable();
            $table->enum('status', ['Baru', 'Sedang Diproses', 'Terbit'])->nullable();
            $table->string('softfile')->nullable();
            $table->string('persetujuan')->nullable();
            $table->string('user_id')->nullable();
            $table->string('pj_id')->nullable();
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
        Schema::dropIfExists('surat_keluar_internal');
    }
};
