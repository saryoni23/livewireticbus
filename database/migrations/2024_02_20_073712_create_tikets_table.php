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
        Schema::create('tbl_tiket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('rute_id');
            $table->foreignId('kategori_id');
            $table->string('nama_tiket');
            $table->string('nama_supir');
            $table->integer('harga');
            $table->integer('jumlah_tiket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_tiket');
    }
};
