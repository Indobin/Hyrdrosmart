<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public $timestamps = false;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('batas_optimals', function (Blueprint $table) {
            $table->id();
            $table->double('suhu_min');
            $table->double('suhu_max');
            $table->double('kelembapan_t_min');
            $table->double('kelembapan_t_max');
            $table->double('kelembapan_u_min');
            $table->double('kelembapan_u_max');
            // $table->unsignedInteger('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batas_optimals');
    }
};
