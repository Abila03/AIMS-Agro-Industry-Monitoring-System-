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
        Schema::create('parameter', function (Blueprint $table) {
            $table->id();
            $table->float('min_suhu');
            $table->float('max_suhu');
            $table->float('min_ph_air');
            $table->float('max_ph_air');
            $table->float('min_ppm_air');
            $table->float('max_ppm_air');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameter');
    }
};
