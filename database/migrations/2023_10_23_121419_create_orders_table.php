<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Ini sudah mencakup auto_increment dan primary key
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal');
            $table->string('total_bayar');
            // $table->unsignedInteger('quantity');
            $table->enum('status', ['dalam proses', 'transaksi selesai'])->default('dalam proses');
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
