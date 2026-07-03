<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_style', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('style_id');
            $table->foreign('style_id')->references('id')->on('styles');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_style');
    }
};
