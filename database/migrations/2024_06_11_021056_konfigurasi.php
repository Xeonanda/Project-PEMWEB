<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migphprations.
     */
    public function up(): void
    {
        Schema::create('konfigurasi', function (Blueprint $table ) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('created_by');
            $table->string('edited_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Konfigurasis');
    }
};
