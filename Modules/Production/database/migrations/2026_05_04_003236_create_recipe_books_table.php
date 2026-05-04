<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("recipe_books", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("raw_product_id")->index();
            $table
                ->foreign("raw_product_id")
                ->references("id")
                ->on("raw_products");

            $table->unsignedBigInteger("menu_product_id")->index();
            $table
                ->foreign("menu_product_id")
                ->references("id")
                ->on("menu_products");
            $table->string("detail");
            // aumentar campos que incluyan la cantidad para hacer ese producto
            // preguntar si tambien es necsario saber , quien ha creado el producto

            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists("recipe_books");
    }
};
