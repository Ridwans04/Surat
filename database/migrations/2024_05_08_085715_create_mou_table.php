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
        Schema::create('mou', function (Blueprint $table) {
            $table->id();
            $table->string('institusi')->nullable();
            $table->string('nomor_mou')->nullable();
            $table->string('tanggal_mou')->nullable();
            $table->string('ket_mou')->nullable();
            $table->string('isi_mou')->nullable();
            $table->string('softfile')->nullable();
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
        Schema::dropIfExists('mou');
    }
};
