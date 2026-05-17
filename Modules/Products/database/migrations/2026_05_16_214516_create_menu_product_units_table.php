<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_product_units', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nombre de la presentacion de la medida
            $table->string('equivalence'); // equivalenia>??
            $table->decimal('price' ,15,2); // precio de venta
            $table->unsignedBigInteger('menu_product_id');
            $table->foreign('menu_product_id')->references('id')->on('menu_products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_product_units');
    }
};
