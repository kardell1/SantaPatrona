<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('combo_replaceaments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('combo_item_id');
            $table->foreign('combo_item_id')->references('id')->on('combo_items');
            $table->unsignedBigInteger('menu_product_variant_id');
            $table->foreign('menu_product_variant_id')->references('id')->on('menu_product_variants');
            $table->integer('amount')->default(1);
            $table->decimal('price', 15, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combo_replaceaments');
    }
};
