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
        Schema::create('sk_tahunan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->nullable();
            $table->string('menimbang')->nullable();
            $table->string('mengingat')->nullable();
            $table->string('memperhatikan')->nullable();
            $table->string('keputusan')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('lama_kerja')->nullable();
            $table->string('tgl_penetapan')->nullable();
            $table->foreignId('pegawai_id');
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
        Schema::dropIfExists('sk_tahunan');
    }
};
