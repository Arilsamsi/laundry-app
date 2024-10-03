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
        Schema::create('laundry', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('pakaian_id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->date('tgl_order');
            $table->date('tgl_selesai');
            $table->string('harga');
            $table->string('berat');
            $table->string('massa');
            $table->integer('total')->nullable();
            $table->timestamps();

            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onDelete('CASCADE');
            $table->foreign('pakaian_id')->references('id')->on('pakaian')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laundry');
    }
};
