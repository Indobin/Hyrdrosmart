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
        Schema::create('monitoring_datas', function (Blueprint $table) {
            $table->id();
            $table->double('suhu_box');
            $table->double('ph_tanah');
            $table->double('kelembapan_tanah');
            $table->double('kelembapan_udara');
            $table->dateTime('tanggal_monitoring');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_datas');
    }
};
