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
        Schema::create('riwayat_monitoring', function (Blueprint $table) {
            $table->id();
            $table->double('suhu');
            $table->double('kelembapan_tanah');
            $table->double('cuaca');
            $table->foreignId('penyiraman_id')
            ->constrained('penyiraman')
            ->onDelete('cascade');
            $table->dateTime('tanggal_monitoring');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_monitoring');
    }
};
