<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variant_size', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->unsignedBigInteger('product_variant_id');
            $table->foreign('product_variant_id')->references('id')->on('product_variants');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variant_size');
    }
};
