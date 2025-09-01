<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('kunjungans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_tamu', 100);
        $table->string('instansi', 150);
        $table->string('tujuan', 150);
        $table->date('tanggal');
        $table->time('waktu');
        $table->string('pegawai_tujuan', 100);
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungans');
    }
};
