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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('namaproduct'); // Product name
            $table->string('gambarproduct'); // Store the file path or image URL
            $table->string('hargaproduct'); // Price with 2 decimal places
            $table->text('deskripsiproduct'); // Product description
            $table->unsignedInteger('stockproduct'); // Stock quantity
            $table->timestamps(); // Created at and Updated at timestamps
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};