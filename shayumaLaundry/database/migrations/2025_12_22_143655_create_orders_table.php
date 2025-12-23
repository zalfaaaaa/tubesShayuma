<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('layanan_id')->constrained('layanans')->cascadeOnDelete();

            $table->decimal('berat', 5, 2)->nullable();
            $table->unsignedInteger('total_harga')->nullable();

            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar')->nullable();
            $table->time('jam_pickup')->nullable();
            $table->time('jam_keluar')->nullable();

            $table->enum('status', [
                'PICKUP',
                'MENUNGGU_PEMBAYARAN',
                'DIPROSES',
                'SELESAI',
                'DIAMBIL'
            ])->default('PICKUP');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
