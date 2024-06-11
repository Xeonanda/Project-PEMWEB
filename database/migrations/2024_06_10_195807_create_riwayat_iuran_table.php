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
        Schema::create('riwayat_iuran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tenant');
            $table->string('tahun_bulan');
            $table->string('jml_bayar');
            $table->date('tgl_bayar');
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
        Schema::dropIfExists('riwayat_iuran');
    }
};
