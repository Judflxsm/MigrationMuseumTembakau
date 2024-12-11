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
        Schema::table('tikets', function (Blueprint $table) {
            $table->id()->first(); // Menambahkan kolom `id` sebagai primary key
        });
    }

    public function down()
    {
        Schema::table('tikets', function (Blueprint $table) {
            $table->dropColumn('id');
        });
    }
};
