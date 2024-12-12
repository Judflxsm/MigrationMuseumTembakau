<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // bigint(20) unsigned, auto increment
            $table->string('name', 255); // varchar(255), not nullable
            $table->string('email', 255)->unique(); // varchar(255), unique key
            $table->string('phone_number', 255)->nullable(); // varchar(255), nullable
            $table->timestamp('email_verified_at')->nullable(); // timestamp, nullable
            $table->string('password', 255)->nullable(); // varchar(255), not nullable
            $table->string('remember_token', 100)->nullable(); // varchar(100), nullable
            $table->timestamps(); // created_at and updated_at timestamps
            $table->string('ticket_type', 255)->default('general'); // varchar(255), default value
            $table->integer('ticket_quantity')->default(1); // default 1 jika tidak diisi
            $table->decimal('total_price', 10, 2)->default(0.00); // default 0.00 jika tidak diisi
            $table->date('purchase_date')->default(DB::raw('CURRENT_DATE')); // date, default current date
            $table->date('visit_date')->nullable(); // date, nullable
        });        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
