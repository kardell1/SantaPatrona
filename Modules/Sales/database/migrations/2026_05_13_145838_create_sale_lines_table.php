<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales');

            $table->unsignedBigInteger('menu_product_id');
            $table->foreign('menu_product_id')->references('id')->on('menu_products');

            $table->decimal('price' , 15,2);
            // para saber si pertenecia a un combo
            // solo se guarda la referencia del nombre, para que no se modifique luego
            $table->string('combo')->nullable();
            $table->boolean('is_combo')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_lines');
    }
};
