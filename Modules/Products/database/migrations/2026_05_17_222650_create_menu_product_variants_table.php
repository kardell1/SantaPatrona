<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_product_variants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_product_id');
            $table->foreign('menu_product_id')->references('id')->on('menu_products');
            $table->string('name'); // debe ser unico???
            $table->integer('divisions')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_product_variants');
    }
};
