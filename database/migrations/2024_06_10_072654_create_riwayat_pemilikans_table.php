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
        Schema::create('riwayat_pemilikans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tenant');
            $table->date('tgl_transaksi');
            $table->unsignedBigInteger('id_pemilik_lama');
            $table->unsignedBigInteger('id_pemilik_baru');
            $table->string('created_by');
            $table->string('edited_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pemilikans');
    }
};
