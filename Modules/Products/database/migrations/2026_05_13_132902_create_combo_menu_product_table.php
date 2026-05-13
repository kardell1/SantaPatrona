<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('combo_menu_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combo_id');
            $table->foreign('combo_id')->references('id')->on('combos');

            $table->unsignedBigInteger('menu_product_id');
            $table->foreign('menu_product_id')->references('id')->on('menu_products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combo_menu_product');
    }
};
