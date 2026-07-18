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
            // unidad origen
            $table->unsignedBigInteger('base_unit_id')->nullable();
            $table->foreign('base_unit_id')->references('id')->on('measurement_units');
            // unidad que equivalente
            $table->unsignedBigInteger('equivalence_id')->nullable();
            $table->foreign('equivalence_id')->references('id')->on('measurement_units');
            $table->string('factor'); // numeros
            $table->timestamps();
            // por ejemplo
            // unidad base : gramos
            // unidad equivalente kilos
            // factor : 1000
            // porque 1000 gramos hacen un kilo
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equivalences');
    }
};
