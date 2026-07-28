<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unit_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('measurement_unit_id'); // magnitud
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units');
            $table->string('name')->unique(); // nombre unidad
            $table->string('acronym')->unique(); // acronimo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unit_types');
    }
};
