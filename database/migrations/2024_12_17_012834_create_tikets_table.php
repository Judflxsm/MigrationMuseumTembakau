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
    Schema::create('tikets', function (Blueprint $table) {
        $table->id('tiket_id');
        $table->unsignedBigInteger('admin_id');
        $table->string('tipe_tiket');
        $table->integer('harga');
        $table->text('deskripsi');
        $table->integer('jumlah_maksimal_pengunjung');
        $table->date('tanggal_kadaluarsa');
        $table->timestamps();

        $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tikets');
    }
};