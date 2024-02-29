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
        Schema::create('profil_usahas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('singkatan');
            $table->string('visi');
            $table->string('isi');
            $table->string('logo');
            $table->string('alamat');
            $table->integer('kodepos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_usahas');
    }
};
