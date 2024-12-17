<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** 
     * Run the migrations. 
     */
    public function up()
{
    Schema::create('acaras', function (Blueprint $table) {
        $table->id('acara_id');
        $table->string('nama_acara');
        $table->date('tanggal_acara');
        $table->string('deskripsi_singkat');
        $table->text('deskripsi');
        $table->string('gambar')->nullable();
        $table->string('google_map_url')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acaras');
    }
};
