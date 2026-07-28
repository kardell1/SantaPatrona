<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equivalences', function (Blueprint $table) {
            $table->id();
            // unidad base de comparacion
            $table->unsignedBigInteger('base_unit_id');
            $table->foreign('base_unit_id')->references('id')->on('unit_types');
            // su equivalencia
            $table->unsignedBigInteger('equivalence_id');
            $table->foreign('equivalence_id')->references('id')->on('unit_types');
            // factor de convercion
            $table->string('factor');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equivalences');
    }
};
