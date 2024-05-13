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
        Schema::create('surat_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('template')->nullable();
            $table->string('institusi')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('pertimbangan')->nullable();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('tugas')->nullable();
            $table->string('hari')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tempat')->nullable();
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
        Schema::dropIfExists('surat_tugas');
    }
};
