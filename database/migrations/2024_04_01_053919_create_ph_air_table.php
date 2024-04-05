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
        Schema::create('ph_air', function (Blueprint $table) {
            $table->id();
            $table->float('ph_air');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ph_air');
    }
};
