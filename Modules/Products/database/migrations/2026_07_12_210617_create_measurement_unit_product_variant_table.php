<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('measurement_unit_product_variant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('measurement_unit_id');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units');
            $table->unsignedBigInteger('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants');
            // siempre que se tenga esta tabla, se especifica la unidad que vamos registrar
            $table->string('amount');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('measurement_unit_product_variant');
    }
};
