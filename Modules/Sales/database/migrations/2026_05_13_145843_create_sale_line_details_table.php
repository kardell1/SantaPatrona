<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sale_line_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('raw_product_id');
            $table->foreign('raw_product_id')->references('id')->on('raw_products');

            $table->unsignedBigInteger('sale_line_id');
            $table->foreign('sale_line_id')->references('id')->on('sale_lines');

            $table->enum('action', ['add', 'remove'])->default('remove');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sale_line_details');
    }
};
