<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("raw_products", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code")->unique();
            $table->unsignedBigInteger("raw_category_id");
            $table
                ->foreign("raw_category_id")
                ->references("id")
                ->on("raw_categories");

            $table->string("unit"); // unidad de medida del producto registrado?
            // agregar campos como presentacion
            // y otros
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("raw_products");
    }
};
