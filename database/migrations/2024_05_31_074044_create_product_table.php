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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kategori');
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->unsignedBigInteger('id_merk');
            $table->foreign('id_merk')->references('id')->on('merk');
            $table->string('nama_product');
            $table->string('gambar')->nullable();
            $table->string('harga');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
