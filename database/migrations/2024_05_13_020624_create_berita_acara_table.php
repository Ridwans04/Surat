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
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->string('institusi')->nullable();
            $table->string('pemohon')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('dasar_rapat')->nullable();
            $table->string('hari')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->string('agenda_rapat')->nullable();
            $table->string('kesimpulan')->nullable();
            $table->string('penutup')->nullable();
            $table->string('tanggal_surat')->nullable();
            $table->string('tanggal_permohonan')->nullable();
            $table->string('tangal_hijriyah')->nullable();
            $table->string('pembuat')->nullable();
            $table->string('nip')->nullable();
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
        Schema::dropIfExists('berita_acara');
    }
};
