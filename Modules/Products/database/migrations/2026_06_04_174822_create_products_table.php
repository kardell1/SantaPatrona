<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->unsignedBigInteger('category_id');
            $table->enum('gender' , ['male' , 'female' , 'both' , 'none' ]);
            $table->foreign('category_id')->references('id')->on('categories');
            // aumentar mas campos de ser necesario
            $table->enum('status' , ['inStock' , 'lowStock' , 'outInStock'])->default('lowStock');
           $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
