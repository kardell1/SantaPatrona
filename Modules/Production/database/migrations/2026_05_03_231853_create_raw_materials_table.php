<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("raw_materials", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("raw_product_id")->index();
            $table
                ->foreign("raw_product_id")
                ->references("id")
                ->on("raw_products");

            // proveedor que facilita el producto
            $table->unsignedBigInteger("provider_id")->index();
            $table->foreign("provider_id")->references("id")->on("people");

            $table->date("adquisition_date");
            $table->date("reception_date");
            $table->date("expired_date");

            // para modulo de presupuestos
            // aunque quizas esto deberia de estar en la categoria
            // $table->unsignedBigInteger("budget_classifier_id")->index();
            // $table->foreign("budget_classifier_id")->references("id")->on("people");

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("raw_materials");
    }
};
