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
        Schema::create('tbl_rute', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('kategori_id');
            $table->string('kota_asal');
            $table->string('kota_tujuan');
            $table->time('jam_berangkat');
            $table->string('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_rute');
    }
};
