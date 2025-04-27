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
        Schema::create('penyiraman', function (Blueprint $table) {
            $table->id();
            $table->enum('mode', ['otomatis', 'manual']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyiraman');
    }
    
};
