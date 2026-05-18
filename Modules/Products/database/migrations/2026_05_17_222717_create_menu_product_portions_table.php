<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_product_portions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_product_variant_id');
            $table->foreign('menu_product_variant_id')->references('id')->on('menu_product_variants');
            $table->string('portion_name');
            $table->decimal('price' , 15,2)->default(0);
            // guarda la cantidad equivalente de la porcion segun el producto
            $table->integer('consumed_division')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_product_portions');
    }
};
