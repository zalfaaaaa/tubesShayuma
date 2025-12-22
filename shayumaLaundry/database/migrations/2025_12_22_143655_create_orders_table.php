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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('nama_layanan');
            $table->enum('jenis_layanan', ['kilat', 'reguler']);
            $table->enum('tipe', ['kilo', 'satuan']);

            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->time('jam_pickup');

            $table->string('status')->default('MENUNGGU_PEMBAYARAN');

            $table->timestamps();
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
