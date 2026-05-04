<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("menu_products", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("is_priority")->default(false);
            // formato numero , precio de venta
            $table->string("suggested_selling_price");
            // costo de produccion
            $table->string("manufacturing_cost");
            // los productos ya fabricados tienen distinta fecha de vencimiento que el material previo preparado
            $table->date("adquisition_date");
            $table->date("reception_date");
            $table->date("expired_date");
            // categoria del producto
            $table->unsignedBigInteger("menu_category_id");
            $table
                ->foreign("menu_category_id")
                ->references("id")
                ->on("menu_categories");

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("menu_products");
    }
};
