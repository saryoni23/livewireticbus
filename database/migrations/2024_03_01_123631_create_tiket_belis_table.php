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
        Schema::create('tbl_tiketbeli', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('tiket_id');
            $table->string('nama_pemesan');
            $table->integer('jumlah_kursi');
            $table->string('nomor_kursi')->nullable();
            $table->string('total_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tiketbeli');
    }
};