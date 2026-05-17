<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_product_extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_product_id');
            $table->foreign('menu_product_id')->references('id')->on('menu_products');
            $table->decimal('price', 15, 2);
            $table->string('details', 150);
            $table->unsignedBigInteger('raw_product_id');
            $table->foreign('raw_product_id')->references('id')->on('raw_products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_product_extras');
    }
};
