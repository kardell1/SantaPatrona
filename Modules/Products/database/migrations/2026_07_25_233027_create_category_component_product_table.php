<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_component_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedBigInteger('component_product_id');
            $table->foreign('component_product_id')->references('id')->on('component_products');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('category_component_product');
    }
};
