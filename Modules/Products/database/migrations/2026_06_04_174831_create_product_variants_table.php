<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('name');
            // unidad minima divisible
            // por ejemplo una pasta de 3 kilos
            // se puede vender por medio litro como unidad minima
            // entonces 3 kilos tiene divisions = a 6 unidades
            // ya que puede dividirse en 6 ventas de medio litro
            $table->integer('divisions');
            $table->decimal('sold_suggest_price');
            // para saber si esta habilitado o deprecado
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
